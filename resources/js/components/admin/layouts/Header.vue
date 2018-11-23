<template>
    <div>
        <nav class="blue darken-1">
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="hide-on-med-and-down">
                    <li><router-link to="/admin/dashboard">Dashboard</router-link></li>
                    <li><router-link to="/admin/users">Users</router-link></li>
                    <li><router-link to="/admin/donations">Donations</router-link></li>
                    <li><router-link to="/admin/campaigns">Campaigns</router-link></li>
                    <li><router-link to="/admin/schools">Schools</router-link></li>
                    <li class="right"><a href="#" class="right" @click.prevent="logout()">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    import Auth from '../../../auth'

    export default {
        methods: {
            logout () {
                Auth.logout()
                this.$router.replace({name : 'login'})
            }
        }
    }
</script>

<style scoped>
    .brand-logo{
        font-size: 16px;
    }
</style>

