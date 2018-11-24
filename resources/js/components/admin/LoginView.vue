<template>
    <div id="app">
        <div class="card col s12 m6">
            <h6>Administrator Login</h6>
            <span
                class="error red darken-4 white-text"
                v-if="error.unableToLogin">
                {{ errorMessage }}
            </span>
            <div class="row">
                <form class="col m12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="email"
                                type="email"
                                class="validate"
                                v-model="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="password"
                                type="password"
                                class="validate"
                                v-model="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                </form>
            </div>
            <a class="blue darken-3 btn" @click="authenticate">Login</a>
        </div>
    </div>
</template>

<script>
    import Auth from '../../auth'

    export default {
        data () {
            return {
                email : '',
                password : '',
                error : {
                    unableToLogin : false,
                },
                errorMessage : 'You cannot login to admin page'
            }
        },

        methods: {
            async authenticate () {
                try {
                    await Auth.authenticate(this.email, this.password)
                    this.$emit('input', true)
                    this.$router.replace({ name: 'dashboard'})
                } catch (err) {
                    this.error.unableToLogin = true
                }
            }
        },

        created () {
            console.log(Auth.LoadCookie())
        }
    }
</script>

<style scoped>
    .card {
        width: 400px;
        padding: 20px;
        margin: 100px auto;
    }

    .error {
        width: 100%;
        padding: 4px;
        border-radius: 3px;
        margin : 0 auto;
    }
</style>

