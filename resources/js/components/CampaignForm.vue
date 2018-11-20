<template>
    <!-- CreateCampaign -->
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

                            <legend class="uk-legend">Create a campaign!</legend>

                            <div class="uk-margin">
                                <label class="uk-form-label">Title</label>
                                <input class="uk-input" type="text" placeholder="Campaign .." v-model="title">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">School</label>
                                <select class="uk-select" name="" id="" v-model="school">
                                    <option
                                        v-for="school in schools"
                                        :key="school.id"
                                        :value="school.id"
                                        v-html="school.name">
                                    </option>
                                </select>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Target</label>
                                <input
                                    class="uk-input"
                                    type="text"
                                    placeholder="Rp 1000 .."
                                    v-model="target">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Date</label>
                                <input
                                    class="uk-input"
                                    placeholder="Date"
                                    name="date"
                                    value=""
                                    type="date"
                                    v-model="date">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Message</label>
                                <textarea
                                    class="uk-textarea"
                                    rows="5"
                                    placeholder="Textarea"
                                    v-model="message"></textarea>
                            </div>

                            <div class="uk-margin">
                                <input class="uk-button" type="button" value="Create campaign" @click="create">
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /CreateCampaign -->
</template>

<script>
    import { mapState, mapActions, mapGetters } from 'vuex'

    export default {
        name: "CampaignForm",
        props: {},

        data () {
            return {
                school : '',
                date : '',
                message : '',
                target : 0,
                title : ''
            }
        },

        computed: {
            ...mapState({
                schools: state => state.School.schools
            }),

            ...mapGetters({
                userId: 'LoggedUser/userId'
            })
        },

        methods: {
            ...mapActions({
                getAllSchools: 'School/getSchools',
                store: 'Campaign/store'
            }),

            create () {
                const payload = {
                    userId: this.userId,
                    schoolId: this.school,
                    title: this.title,
                    body: this.message,
                    date: this.date,
                    target: this.target
                }

                try {
                    this.store(payload)
                    console.log("berhasil!")
                } catch (err) {
                    console.log(err)
                }
            }
        },

        async created () {
            await this.getAllSchools()
        }
    }

</script>

<style>

</style>
