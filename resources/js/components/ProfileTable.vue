<template>
    <section class="uk-section uk-section-default uk-box-shadow-small uk-section-xsmall">
        <div class="uk-container">
            <div data-uk-grid="">
                <StickyMenu />

                <div class="uk-width-4-5" v-if="campaigns">
                    <h2 class="uk-heading-divider">{{ jenis }} Saya</h2>
                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>{{ table[0] }}</th>
                                <th>{{ table[1] }}</th>
                                <th>{{ table[2] }}</th>
                                <th>{{ table[3] }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="campaign in campaigns"
                                :key="campaign.id">
                                <td v-html="campaign.title"></td>
                                <td>Rp {{ campaign.target }}</td>
                                <td>Rp {{ campaign.raised }}</td>
                                <td>
                                    <router-link
                                        class="uk-button uk-button-primary"
                                        :to="{name: 'campaign-detail', params: {campaign_id: campaign.id}}">View</router-link>
                                    <router-link
                                        class="uk-button uk-button-primary"
                                        :to="{name: 'campaign-edit', params: {id: campaign.id}}">Edit</router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="batas"></div>
                </div>

                <div class="uk-width-4-5" v-if="donations">
                    <h2 class="uk-heading-divider">{{ jenis }} Saya</h2>
                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>{{ table[0] }}</th>
                                <th>{{ table[1] }}</th>
                                <th>{{ table[2] }}</th>
                                <th>{{ table[3] }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="donation in formattedDonations"
                                :key="donation.id">
                                <td v-html="donation.donors"></td>
                                <td>Rp {{ donation.amount }}</td>
                                <td v-html="donation.status"></td>
                                <td>
                                    <input type="submit" class="uk-button uk-button-primary" value="Upload proof"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="batas"></div>
                </div>
                <!-- ISI -->

            </div>
        </div>
    </section>
</template>

<script>
    import Row from '../components/TableRow.vue'
    import StickyMenu from '../components/StickyMenu.vue'

    export default {
        name: "profile-table",
        props:{
            campaigns: {
                type: Array
            },
            donations: {
                type: Array
            },
            jenis: {
                type: String
            },
            table: {
                type: Array
            }
        },
        components: {
            Row,
            StickyMenu
        },

        computed: {
            formattedDonations () {
                return this.donations.map(item => {
                    item.status = item.status === 0 ? 'Not verified' : 'Verified'

                    return item
                })
            }
        }
    }

</script>

<style>

</style>
