<template>
    <div class="uk-container uk-flex uk-flex-center uk-flex-middle uk-height-viewport uk-border-rounded">

        <div uk-grid>
            <div class="uk-width-2-5@s uk-width-1-1 uk-padding-small uk-flex uk-flex-center uk-inline">
                <div class="uk-overlay-primary uk-position-cover" v-if="doOverlay"></div>
                <div class="uk-overlay uk-position-bottom-center uk-light uk-text-center" v-if="doOverlay">
                    <p>Harap Tunggu Sebentar, sedang memanggil server..</p>
                </div>
                <div class="uk-width-medium@s uk-width-auto">
                    <form>
                        <fieldset class="uk-fieldset">
                            <div class="uk-margin">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon: user"></span>
                                    <input class="uk-input uk-form-large" v-model="name" required="" placeholder="Username"
                                        type="text" :disabled="doOverlay">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon: mail"></span>
                                    <input class="uk-input uk-form-large" v-model="email" required="" placeholder="your@email.com"
                                        type="text" :disabled="doOverlay">
                                </div>
                            </div>
                            <hr>

                            <div class="uk-margin">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon: lock"></span>
                                    <input class="uk-input uk-form-large" v-model="password" required="" placeholder="Password"
                                        type="password" :disabled="doOverlay">
                                </div>
                            </div>
                            <div>
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon: check"></span>
                                    <input class="uk-input uk-form-large" v-model="confirmPassword" v-on:keyup="passwordCheck"
                                        required="" placeholder="Password" type="password" :disabled="doOverlay">
                                </div>
                                <span v-if="error.password" class="red">Your password is different</span>

                            </div>

                            <div class="uk-margin">
                                <button @click="registerHandler" class="uk-button uk-button-primary uk-button-primary uk-button-large uk-width-1-1">Simpan</button>
                            </div>
                        </fieldset>
                    </form>
                    <div>
                        <div class="uk-text-center" uk-grid>
                            <div class="uk-width-1-2">
                                <a class="uk-link-reset uk-text-small">Sudah punya akun?</a>
                            </div>
                            <div class="uk-width-1-2">
                                <a class="uk-button uk-button-secondary uk-link-reset uk-text-small">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-width-3-5 uk-flex uk-flex-bottom uk-flex-center uk-background-default uk-visible@s">
                <div class="uk-width-1-1" uk-grid>
                    <div class="uk-background-cover uk-width-1-1 uk-height-medium uk-margin-top" style="background-image: url(images/2.jpg)"></div>
                    <div class="uk-width-xlarge uk-margin-bottom">
                        <h2 class="uk-text-bold">Buat dan Mulai Donasi</h2>
                        <h4>Selesaikan dan mulai mendonasikan kepada anak-anak yang membutuhkan! Has bil donasi anda
                            akan
                            disalurkan oleh pihak kami kepada penerima.</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import Auth from '../auth'

    export default {
        name: "register-form",
        props: {},

        data() {
            return {
                email: '',
                password: '',
                name: '',
                confirmPassword: '',
                error: {
                    password: false,
                    button: false
                },
                standby: false
            }
        },
        computed: {
            doOverlay: function () {
                // `this` points to the vm instance
                return this.standby
            }
        },

        methods: {
            passwordCheck() {
                if (this.password !== this.confirmPassword) {
                    this.error.password = true
                    this.error.button = true
                    return this.error
                }

                this.error.password = false
                this.error.button = false
                return this.error
            },

            async registerHandler(e) {
                e.preventDefault()
                this.standby = true;
                try {
                    await Auth.register(this.email, this.name, this.password, this.confirmPassword);
                    UIkit.notification("<span uk-icon='icon: happy'></span> Message", {
                        pos: 'top-right',
                        status: 'primary'
                    })
                    this.standby = false;
                } catch (err) {
                    console.log(err);
                    UIkit.notification("<span uk-icon='icon: warning'></span> Gagal dalam membuat user!!", {
                        pos: 'top-right',
                        status: 'danger'
                    })
                    this.standby = false;
                }
            }
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
