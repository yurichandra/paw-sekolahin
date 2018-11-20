<template>
    <!-- NAV-->
    <div class="uk-box-shadow-small uk-background-default" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <div class="uk-container">
            <nav class="uk-background-default uk-navbar" data-uk-navbar="">
                <div class="uk-navbar-left">
                    <div class="uk-navbar-item">
                        <router-link to="/" class="uk-logo"><img src="img/cover-logo.svg" alt="Logo"></router-link>
                    </div>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li class="uk-visible@s">
                            <router-link to="/campaign">Campaign</router-link>
                        </li>
                        <li class="uk-visible@s">
                            <router-link
                                to="/profile"
                                v-if=auth>
                                Profile
                            </router-link>
                        </li>
                        <li class="uk-visible@s">
                            <router-link
                                @click.native="ShowModal"
                                to=""
                                v-if=!auth>
                                Login
                            </router-link>
                            <router-link
                                @click.native="logoutHandler"
                                to=""
                                v-if=auth>
                                Logout
                            </router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- /NAV-->
</template>

<script>
    import { mapGetters } from 'vuex'
    import Auth from '../auth'

    export default {
        name: 'header',
        props: {},
        methods: {
            ShowModal() {
                var element = document.getElementById("modal-center");
                UIkit.modal(element).show();
            },

            logoutHandler () {
                Auth.logout()
                this.$router.replace({name: 'home'})
            }
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
        }
    }
  
</script>

<style>
</style>
