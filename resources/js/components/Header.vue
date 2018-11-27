<template>
    <!-- NAV-->
    <div class="uk-box-shadow-small uk-background-default" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <div class="uk-container">
            <nav class="uk-background-default uk-navbar" data-uk-navbar="">
                <div class="uk-navbar-left">
                    <div class="uk-navbar-item">
                        <router-link to="/" class="uk-logo">SEKOLAH.IN</router-link>
                    </div>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        <li class="uk-visible@s">
                            <router-link to="/campaign">Campaign</router-link>
                        </li>
                        <li class="uk-visible@s">
                            <router-link to="/profile/akun" v-if=auth>
                                Profile
                            </router-link>
                        </li>
                        <li class="uk-visible@s">
                            <router-link @click.native="ShowModal" to="" v-if=!auth>
                                Login
                            </router-link>
                            <router-link @click.native="logoutHandler" to="" v-if=auth>
                                Logout
                            </router-link>
                        </li>
                        <li class="uk-hidden@s">
                            <a href="#" data-uk-icon="icon:menu" class="uk-icon" aria-expanded="false"></a>
                            <div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-right" style="left: 1000px; top: 80px;">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><router-link to="/campaign"><span data-uk-icon="icon: arrow-right" class="uk-icon"></span> Campaigns</router-link></li>
                                    <li v-if="!auth"><router-link to="" @click.native="ShowModal"><span data-uk-icon="icon: login" class="uk-icon"></span> Login</router-link></li>
                                    <li v-if="auth"><router-link to="/profile/akun"><span data-uk-icon="icon: user" class="uk-icon"></span> Profile</router-link></li>
                                    <li v-if="auth"><router-link to="" @click.native="logoutHandler"><span data-uk-icon="icon: sign-out" class="uk-icon"></span> Logout</router-link></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- /NAV-->
</template>

<script>
    import {
        mapGetters
    } from 'vuex'
    import Auth from '../auth'

    export default {
        name: 'header',
        props: {},
        methods: {
            ShowModal() {
                var element = document.getElementById("modal-center");
                UIkit.modal(element).show();
            },

            logoutHandler() {
                Auth.logout()
                this.$router.replace({
                    name: 'home'
                })
            }
        },

        computed: {
            ...mapGetters({
                status: 'LoggedUser/status'
            }),

            auth() {
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
