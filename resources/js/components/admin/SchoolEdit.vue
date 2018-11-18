<template>
    <div>
        <div class="card col s12 m12 m5">
            <h6>Update school</h6>
            <div class="row">
                <form class="col m12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="email"
                                type="text"
                                class="validate"
                                v-model="school.name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="password"
                                type="text"
                                class="validate"
                                v-model="school.address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="telephone"
                                type="text"
                                class="validate"
                                v-model="school.telephone">
                        </div>
                    </div>
                </form>
            </div>
            <a class="blue darken-3 btn" @click="save">Update School</a>
        </div>
        <div class="alert-success" v-if="success">
            <span>Berhasil ubah data!</span>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapState } from 'vuex'

    export default {
        data () {
            return {
                success: false
            }
        },

        computed: {
            ...mapState({
                school: state => state.School.school
            }),
        },

        methods : {
            ...mapActions({
                updateSchool: 'School/update',
                getSchool: 'School/get'
            }),

            save () {
                this.updateSchool(this.school)
                this.success = true
            }
        },

        async created () {
            await this.getSchool(this.$route.params.id)
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

    .alert-success {
        background: #66cc99;
        color: white;
        padding: 5px;
        margin: 0 auto;
        width: 150px;
        text-align: center;
        border-radius: 3px;
    }
</style>
