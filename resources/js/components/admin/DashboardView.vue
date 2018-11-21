<template>
    <div>
        <router-view></router-view>
        <div class="row">
            <div class="col m4">
                <DonationCard />
            </div>
            <div class="col m4">
                <CampaignCard :count="campaignCount"/>
            </div>
            <div class="col m4">
                <SchoolCard :count="schoolCount"/>
            </div>
        </div>
        <div class="p5">
            <h5>Latest User</h5>
            <LatestUser :users="reverseUsers"/>
        </div>
        <div class="p5">
            <h5>Latest Campaign</h5>
            <LatestCampaign :campaigns = "campaigns"/>
        </div>

    </div>
</template>

<script>
    import { mapGetters, mapActions, mapState } from 'vuex'
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

        methods: {
            ...mapActions({
                getAllCampaigns: 'Campaign/getCampaigns',
                fetchDonations: 'Donation/getAllDonations',
                fetchSchool: 'School/getSchools',
                fetchUsers: 'User/getUsers'
            })
        },

        computed: {
            ...mapGetters({
                name : 'LoggedUser/name'
            }),

            ...mapState({
                campaigns: state => state.Campaign.campaigns,
                schools: state => state.School.schools,
                donations: state => state.Donation.donations,
                users: state => state.User.users
            }),

            campaignCount () {
                return this.campaigns.length ? this.campaigns.length : 0
            },

            schoolCount () {
                return this.schools.length ? this.schools.length : 0
            },

            reverseUsers () {
                return this.users.reverse()
            }
        },

        async created () {
            this.getAllCampaigns()
            this.fetchDonations()
            this.fetchSchool()
            this.fetchUsers()
        }
    }
</script>

<style scoped>
    .p5 {
        padding: 0 15px;
    }
</style>

