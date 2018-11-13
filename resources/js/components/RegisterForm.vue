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

                            <legend class="uk-legend">Register</legend>

                            <div class="uk-margin">
                                <label class="uk-form-label">Email</label>
                                <input
                                    class="uk-input"
                                    type="email"
                                    placeholder="Email"
                                    v-model="email">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Name</label>
                                <input
                                    class="uk-input"
                                    type="text"
                                    placeholder="Name"
                                    v-model="name">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Password</label>
                                <input
                                    class="uk-input"
                                    type="password"
                                    placeholder="Password"
                                    v-model="password">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Confirm Password</label>
                                <input
                                    class="uk-input"
                                    type="password"
                                    placeholder="Confirm Password"
                                    v-model="confirmPassword"
                                    @keyup="passwordCheck">
                            </div>

                            <span v-if="error">Your password is different</span>

                            <div class="uk-margin">
                                <input
                                    class="uk-button"
                                    type="button"
                                    value="register"
                                    @click="registerHandler">
                            </div>

                        </fieldset>
                    </form>
                    Have an account? <router-link to="/login">Login here</router-link>
                </div>
            </div>
        </div>
    </section>
    <!-- /Login -->
</template>

<script>
    import Auth from '../auth'

    export default {
        name: "LoginForm",
        props: {},

        data () {
            return {
                email : '',
                password : '',
                name : '',
                confirmPassword : '',
                error : false
            }
        },

        methods: {
            passwordCheck () {
                if (this.password !== this.confirmPassword) {
                    this.error = true
                    return this.error
                }

                this.error = false
                return this.error
            },

            async registerHandler () {
                try {
                    await Auth.register(this.email, this.name, this.password, this.confirmPassword)
                    console.log('Berhasil daftar!')
                } catch (err) {
                    console.log(err)
                }
            }
        }
    }

</script>

<style>

</style>
