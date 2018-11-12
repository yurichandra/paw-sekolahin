<template>
    <div id="app">
        <HeaderView v-if="auth"/>
        <router-view v-model="auth"></router-view>
    </div>
</template>

<script>
    import LoginView from './admin/LoginView'
    import Header from './admin/layouts/Header.vue'
    import Http from '../auth'

    export default {
        components: {
            HeaderView : Header,
            LoginView: LoginView
        },

        data () {
            return {
                auth : false
            }
        },

        mounted () {
            if (!this.auth) {
                this.$router.replace({name : "login"})
            }
        },
    }
</script>
