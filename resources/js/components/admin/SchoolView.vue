<template>
    <div>
        <div class="card col s12 m12 m5">
            <h6>Add new school</h6>
            <div class="row">
                <form class="col m12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="email"
                                type="text"
                                class="validate"
                                v-model="name">
                            <label for="email">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="password"
                                type="text"
                                class="validate"
                                v-model="address">
                            <label for="password">Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="telephone"
                                type="text"
                                class="validate"
                                v-model="telephone">
                            <label for="telephone">Telephone</label>
                        </div>
                    </div>
                </form>
            </div>
            <a class="blue darken-3 btn" @click="addSchool">Add New School</a>
        </div>
        <div class="p5">
            <h5>Schools</h5>
            <a class="waves-effect blue darken-3 btn">Download</a>
        </div>
        <div class="card col s12 m12 m5">
             <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <tr
                    v-for="school in schools"
                    :key="school.id">
                    <td v-html="school.name"></td>
                    <td v-html="school.address"></td>
                    <td v-html="school.telephone">
                    </td>
                    <td>
                        <a class="waves-effect waves-light btn">Update</a>
                        <a
                            class="waves-effect red accent-4 btn"
                            @click="deleteSchool(school.id)">Delete</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapState } from 'vuex'

    export default {
        data () {
            return {
                name : '',
                address : '',
                telephone : ''
            }
        },

        computed: {
            ...mapState({
                schools: state => state.School.schools
            }),
        },

        methods : {
            ...mapActions({
                storeSchool: 'School/store',
                getAllSchools: 'School/getSchools',
                deleteSchool: 'School/destroy'
            }),

            addSchool () {
                const payload = {
                    'name': this.name,
                    'address': this.address,
                    'telephone': this.telephone
                }

                try {
                    this.storeSchool(payload)
                    console.log('success!')
                } catch (err) {
                    console.log(err)
                }
            },

            deleteSchool (id) {
                try {
                    this.deleteSchool(id)
                    console.log(id)
                    console.log('Delete Succeed!')
                } catch (err) {
                    console.log(err)
                }
            }
        },

        async created () {
            await this.getAllSchools()
        }
    }
</script>

<style scoped>
    .m5 {
        margin: 10px 50px;
        padding: 15px;
    }

    .p5 {
        padding: 0 50px;
    }
</style>
