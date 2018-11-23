<template>
    <section class="uk-section uk-section-default uk-box-shadow-small uk-section-xsmall">
        <div class="uk-container">
            <div data-uk-grid="">
                <StickyMenu />
                <!-- ISI -->
                <div class="uk-width-4-5">
                    <h2 class="uk-heading-divider">My Account</h2>
                    <form class="uk-form-horizontal">
                        <fieldset class="uk-fieldset">
                            <div class="uk-margin">
                                <label class="uk-form-label">Name</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" placeholder="name" v-model="name">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">Identity Number</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" placeholder="Input" v-model="identity">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">Phone Number</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" placeholder="Input" v-model="telephone">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <input class="uk-button" type="button" @click="update" value="Save"/>
                            </div>

                        </fieldset>
                    </form>
                    <div id="batas"></div>
                </div>
                <!-- ISI -->
            </div>
        </div>
        <LoginForm />
    </section>
</template>

<script>
    import StickyMenu from '../components/StickyMenu.vue'
    import CampaignForm from '../components/CampaignForm.vue'
    import { mapState, mapActions } from 'vuex'
    import LoginForm from './LoginForm.vue'
import LoggedUser from '../store/modules/LoggedUser';

    export default {
        name: "profile-edit",
        components: {
            StickyMenu,
            CampaignForm,
            LoginForm
        },
        props: {},

        data () {
            return {
                name: '',
                telephone: '',
                identity: ''
            }
        },

        computed: {
            ...mapState({
                user: state => state.User.user,
                loggedUser: state => state.LoggedUser.User
            })
        },

        methods: {
            ...mapActions({
                updateUser: 'User/update',
                getUser: 'User/get'
            }),

            update () {
                const payload = {
                    name : this.name,
                    phoneNumber : this.telephone,
                    identityNumber : this.identity,
                    id: this.loggedUser.id
                }

                try {
                    this.updateUser(payload)
                    console.log("Berhasil!")
                } catch (err) {
                    console.log(err)
                }
            }
        },

        async created () {
            await this.getUser(this.loggedUser.id)
        }
    }

</script>

<style>

</style>
