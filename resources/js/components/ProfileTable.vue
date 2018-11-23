<template>
    <section class="uk-section uk-section-default uk-box-shadow-small uk-section-xsmall">
        <div class="uk-container">
            <div data-uk-grid="">
                <StickyMenu />

                <!-- ISI -->
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
                            <Row />
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
                                v-for="campaign in campaigns"
                                :key="campaign.id">
                                <td v-html="campaign.title"></td>
                                <td v-html="campaign.target"></td>
                                <td v-html="campaign.raised"></td>
                                <td>
                                    <button class="uk-button uk-button-primary">View</button>
                                    <button class="uk-button uk-button-default">Edit</button>
                                    <button class="uk-button uk-button-danger">Delete</button>
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
        }
    }

</script>

<style>

</style>
