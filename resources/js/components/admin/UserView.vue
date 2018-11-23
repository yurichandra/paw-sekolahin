<template>
    <div class="container">
        <h5>Latest User</h5>
        <a class="waves-effect waves-light btn">Download</a>
        <div class="card">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="user in users"
                        :key="user.id">
                        <td v-html="user.id"></td>
                        <td v-html="user.name"></td>
                        <td v-html="user.email"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex'

    export default {
        computed: {
            ...mapState({
                users: state => state.User.users
            })
        }
    }
</script>

<style scoped>
    .p5 {
        padding: 0 50px;
    }
</style>

