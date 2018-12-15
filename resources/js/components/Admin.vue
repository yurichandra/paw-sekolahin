<template>
    <div id="app">
        <HeaderView v-if="auth"/>
        <router-view></router-view>
    </div>
</template>

<script>
    import LoginView from './admin/LoginView'
    import Header from './admin/layouts/Header.vue'
    import Auth from '../auth'
    import { mapGetters } from 'vuex'

    export default {
        components: {
            HeaderView : Header,
            LoginView: LoginView
        },
        
        computed: {
            ...mapGetters({
                status: 'LoggedUser/status'
            }),

            auth () {
                if (this.status === true) {
                    return true
                }

                return false
            }
        },

        mounted () {
            if (!this.auth) {
                this.$router.replace({name : "login"})
            }
        },
    }
</script>
