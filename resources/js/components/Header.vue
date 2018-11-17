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
                            <router-link to="/partners">Partners</router-link>
                        </li>
                        <li class="uk-visible@s">
                            <router-link @click.native="ShowModal" to="">Login</router-link>
                        </li>
                        <li><a class="uk-icon" data-uk-icon="menu"></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- /NAV-->
</template>

<script>
    export default {
        name: 'header',
        props: {},
        methods: {
            ShowModal() {
                var element = document.getElementById("modal-center");
                UIkit.modal(element).show();
            }
        }
    }

</script>

<style>

</style>
