<template>
  <div class="campaign-create" style="background-image: url(images/pattern.png)">
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

                            <legend class="uk-legend">Edit a campaign!</legend>

                            <div class="uk-margin">
                                <label class="uk-form-label">Title</label>
                                <input class="uk-input" type="text" placeholder="Campaign .." v-model="campaign.title" required>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Date</label>
                                <input class="uk-input" placeholder="Date" name="date" value="" type="date" v-model="campaign.date"
                                    required>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Message</label>
                                <textarea class="uk-textarea" rows="5" placeholder="Textarea" v-model="campaign.body"
                                    required></textarea>
                            </div>

                            <div class="uk-margin">
                                <input class="uk-button" type="button" value="Edit campaign" @click="update">
                            </div>

                        </fieldset>
                    </form>
                    <span class="alert-success" v-if="status">Edit Succesfully!</span>
                </div>
            </div>
        </div>

        <div id="modal-loading" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" bg-close="true">
                <div uk-spinner></div>
            </div>
        </div>
    </section>
    <LoginForm />
  </div>
</template>

<script>
  import {
        mapState,
        mapActions,
        mapGetters
    } from 'vuex'

    export default {
        name: "CampaignEdit",
        props: {

        },

        data() {
            return {
                date: '',
                message: '',
                title: '',
                status: false
            }
        },

        computed: {
            ...mapGetters({
                userId: 'LoggedUser/userId',
                ongoing: 'Util/ongoing'
            }),

            ...mapState({
                campaign: state => state.Campaign.campaign
            })
        },

        watch: {
            ongoing: function (val) {
                var element = document.getElementById("modal-loading");
                if (val === true)
                    UIkit.modal(element).show();
                else
                    UIkit.modal(element).hide();
            }
        },

        methods: {
            ...mapActions({
                store: 'Campaign/store',
                fetch: 'Campaign/get',
                updateCampaign: 'Campaign/update'
            }),

            update() {
                const payload = {
                    id: this.campaign.id,
                    body: this.campaign.body,
                    title: this.campaign.title,
                    date: this.campaign.date
                }

                try {
                    this.updateCampaign(payload)
                    this.status = true
                } catch (err) {
                    console.log(err)
                }
            }
        },

        async created () {
            await this.fetch(this.$route.params.id)
        }
    }

</script>

<style scoped>
    .alert-success {
        background: #66cc99;
        color: white;
        padding: 5px;
        margin: 0 auto;
        width: 300px;
        text-align: center;
        border-radius: 3px;
    }
</style>

