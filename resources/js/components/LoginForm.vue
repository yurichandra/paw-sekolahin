<template>
    <!-- Login -->
    <section class="uk-section uk-section-small">
        <div class="uk-container uk-container-small uk-hidden@s uk-background-cover" style="height: 100px; width: 100%; background-image: url(images/2.jpg)"></div>
        <div class="uk-container uk-container-small uk-background-default">
            <div data-uk-grid="">
                <div class="uk-width-1-5 uk-cover-container uk-visible@s">
                    <img src="images/2.jpg" alt="Alt img" data-uk-cover="" class="uk-cover" style="height: 462px; width: 1200px;">
                </div>
                <div class="uk-width-4-5@s uk-width-1-1 uk-margin">
                    <form class="uk-form-stacked">
                        <fieldset class="uk-fieldset">

                            <legend class="uk-legend">Login</legend>

                            <div class="uk-margin">
                                <label class="uk-form-label">Email</label>
                                <input class="uk-input" type="text" placeholder="Email ..">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Password</label>
                                <input class="uk-input" type="password" placeholder="Password ..">
                            </div>

                            <div class="uk-margin">
                                <input class="uk-button" type="button" value="Login">
                            </div>

                        </fieldset>
                    </form>
                    Don't have an account? <router-link to="/register">Register here</router-link>
                </div>
            </div>
        </div>
    </section>
    <!-- /Login -->
</template>

<script>
    export default {
        name: "LoginForm",
        props: {}
    }

</script>

<style>

</style>
