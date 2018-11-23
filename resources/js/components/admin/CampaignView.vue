<template>
    <div class="container">
        <h5>Latest Campaign</h5>
        <a class="waves-effect waves-light btn">Download</a>
        <div class="card">
            <table>
                <thead>
                <tr>
                    <th>Campaign Title</th>
                    <th>Raised</th>
                    <th>Target</th>
                </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="campaign in campaigns"
                        :key="campaign.id">
                        <td v-html="campaign.title"></td>
                        <td>Rp {{ campaign.raised }}</td>
                        <td>Rp {{ campaign.target }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex'

    export default {
        computed: {
            ...mapState({
                campaigns: state => state.Campaign.campaigns
            })
        }
    }
</script>

<style scoped>
    .p5 {
        padding: 0 50px;
    }
</style>

