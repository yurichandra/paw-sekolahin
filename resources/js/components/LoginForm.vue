<template>

    <div id="modal-center" class="uk-flex-top" style="background-image: url(images/pattern.png)" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-width-large uk-flex uk-flex-center">

            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-width-medium">
                <form>
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">MASUK</legend>
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon: user"></span>
                                <input v-model="email" class="uk-input uk-form-large" required="" placeholder="nice@mail.com"
                                    type="text">
                            </div>
                        </div>
                        <div class="uk-margin uk-margin-remove-bottom">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon: lock"></span>
                                <input v-model="password" class="uk-input uk-form-large" required="" placeholder="Password"
                                    type="password">
                            </div>
                        </div>
                        <span v-if="error" class="red">Gagal dalam autentifikasi</span>
                        <div class="uk-margin">
                            <label><input v-model="CheckCookie" class="uk-checkbox" type="checkbox"> Keep me logged in</label>
                        </div>
                        <div class="uk-margin">
                            <button @click="LoginHandler" type="submit" class="uk-button uk-button-primary uk-button-primary uk-button-large uk-width-1-1">LOG
                                IN</button>
                        </div>
                    </fieldset>
                </form>
                <div>
                    <div data-uk-grid="">
                        <div class="uk-text-center"><a class="uk-link-reset uk-text-small" data-uk-toggle="target: #recover;animation: uk-animation-slide-top-small">Forgot
                                your password?</a></div>
                        <div class="uk-text-left">
                            <router-link to="/register" class="uk-button uk-button-small uk-button-danger" @click.native="ShowRegister">Buat
                                akun!</router-link>
                        </div>
                    </div>
                    <div class="uk-margin-small-top" id="recover" hidden="">
                        <form action="login.html">

                            <div class="uk-margin-small">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon: mail"></span>
                                    <input class="uk-input" placeholder="E-mail" required="" type="text">
                                </div>
                            </div>
                            <div class="uk-margin-small">
                                <button type="submit" class="uk-button uk-button-primary uk-button-primary uk-width-1-1">SEND
                                    PASSWORD</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import Auth from '../auth'

    export default {
        name: "login-form",
        
        props: {},
        
        data() {
            return {
                email: '',
                password: '',
                saved: false,
                error: false,
                standby: false
            }
        },

        computed: {
            CheckCookie() {
                const SavedEmail = Auth.getToken();
                if (SavedEmail) {
                    this.saved = true;
                    return true;
                }
                return false;
            }
        },

        methods: {
            ShowRegister() {
                var element = document.getElementById("modal-center");
                console.log("your ele", element)

                UIkit.modal(element).hide();
            },

            async LoginHandler(e) {
                e.preventDefault();
                this.standby = true;
                try {
                    await Auth.authenticate(this.email, this.password)
                    UIkit.notification("<span uk-icon='icon: happy'></span> Berhasil Login!", {
                        pos: 'top-right',
                        status: 'primary'
                    })

                    var element = document.getElementById("modal-center");
                    UIkit.modal(element).hide();
                    this.error = false;
                    this.standby = false;
                } catch (err) {
                    console.log(err)
                    UIkit.notification("<span uk-icon='icon: warning'></span> Gagal Login!!", {
                        pos: 'top-right',
                        status: 'danger'
                    });
                    this.error = true;
                    this.standby = false;
                }
            },
        }
    }

</script>

<style scoped>
    .red {
        background-color: red;
        padding: 5px;
        color: white;
        border-radius: 5px;
    }

    .green {
        background-color: green;
        padding: 5px;
        color: white;
        border-radius: 5px;
    }

</style>
