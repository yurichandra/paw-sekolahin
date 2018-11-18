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
                            <a href="" data-uk-icon="user">
                                <img class="uk-border-circle" width="32" height="32" src="https://unsplash.it/80/80/?random">
                            </a>
                            <div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-right" style="left: 1000px; top: 80px;">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header uk-text-small uk-text-primary">YOUR ACCOUNT</li>
                                    <li><a href="#"><span data-uk-icon="icon: info" class="uk-icon"></span> Profile</a></li>
                                    <li><a href="#"><span data-uk-icon="icon: arrow-right" class="uk-icon"></span>
                                            Campaign List</a></li>
                                    <li><a href="#"><span data-uk-icon="icon: arrow-right" class="uk-icon"></span>
                                            Donation</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="#"><span data-uk-icon="icon: sign-out" class="uk-icon"></span>
                                            Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="uk-icon" data-uk-icon="menu"></a>
                            <div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-right" style="left: 1000px; top: 80px;">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li class="uk-nav-header uk-text-small uk-text-primary">Menu</li>
                                    <li><a href="#"><span data-uk-icon="icon: user" class="uk-icon"></span>
                                            Robertus Yudho</a></li>
                                    <li><a href="#"><span data-uk-icon="icon: warning" class="uk-icon"></span>
                                            Campaign</a></li>
                                    <li><a href="#"><span data-uk-icon="icon: settings" class="uk-icon"></span>
                                            Partners</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="#"><span data-uk-icon="icon: sign-out" class="uk-icon"></span>
                                            Logout</a></li>
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
export default {
  name: "header",
  props: {},
  methods: {
    ShowModal() {
      var element = document.getElementById("modal-center");
      UIkit.modal(element).show();
    }
  }
};
</script>

<style>
</style>
