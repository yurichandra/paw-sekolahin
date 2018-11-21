<template>
    <div>
        <div style="background-image: url(images/pattern.png)">
            <Author :nama="Donasi"/>
            <Article :judul_root="campaign.title" :deskripsi_root="campaign.body" :tanggal_root="campaign.date" :target_root="campaign.target" :raised_root="campaign.raised"/>
        </div>
        <Donation />
        <Bar :target_root="campaign.target" :raised_root="campaign.raised"/>
    </div>
</template>

<script>
    import Author from '../components/AuthorDetail.vue'
    import Bar from '../components/BottomBar.vue'
    import Article from '../components/Article.vue'
    import Donation from '../components/Donation.vue'
    import router from '../service/home/routes'

    import {
        mapState,
        mapActions
    } from 'vuex'

    export default {
        name: 'campaign-detail',
        components: {
            Article,
            Author,
            Bar,
            Donation
        },
        computed: {
            ...mapState({
                campaign: state => state.Campaign.campaign
            }),
            Donasi(){
                return "Donasi"
            }
        },

        methods: {
            ...mapActions({
                getCampaign: 'Campaign/get'
            }),
        },

        async created() {
            await this.getCampaign(this.$route.params.id)
        }
    }

</script>

<style>

</style>
