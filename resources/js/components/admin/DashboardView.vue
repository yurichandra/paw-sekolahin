<template>
    <div>
        <router-view></router-view>
        <div class="row">
            <div class="col m4">
                <DonationCard />
            </div>
            <div class="col m4">
                <CampaignCard />
            </div>
            <div class="col m4">
                <SchoolCard />
            </div>
        </div>
        <div class="p5">
            <h5>Latest User</h5>
            <LatestUser />
        </div>
        <div class="p5">
            <h5>Latest Campaign</h5>
            <LatestCampaign />
        </div>

    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    import Header from './layouts/Header.vue'
    import DonationCard from './cards/DonationCards.vue'
    import CampaignCard from './cards/CampaignCards.vue'
    import SchoolCard from './cards/SchoolCards.vue'
    import LatestUser from './cards/LatestUserCard.vue'
    import LatestCampaign from './cards/LatestCampaignCard.vue'

    export default {
        components: {
            HeaderView : Header,
            DonationCard : DonationCard,
            CampaignCard : CampaignCard,
            SchoolCard : SchoolCard,
            LatestUser : LatestUser,
            LatestCampaign : LatestCampaign
        },

        data () {
            return {

            }
        },

        computed: {
            ...mapGetters({
                name : 'LoggedUser/name'
            })
        }
    }
</script>

<style scoped>
    .p5 {
        padding: 0 15px;
    }
</style>

