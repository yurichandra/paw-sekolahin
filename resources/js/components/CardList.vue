<template>
    <!-- Card-->
    <section class="uk-section uk-section-small uk-section-default uk-padding-remove-bottom" data-uk-filter="target: .js-filter">
        <div class="uk-container uk-container-expand uk-margin-large-bottom">

            <div class="uk-grid-small" data-uk-grid="">
                <div class="uk-width-4-5">
                    <ul class="uk-subnav uk-subnav-pill">
                        <li class="uk-active" data-uk-filter-control=""><a href="#">Semua</a></li>
                    </ul>
                </div>
                <div class="uk-width-1-5@s uk-margin-auto">
                    <div class="uk-text-right uk-visible@s">
                        <router-link to="/create" tag="button" class="uk-button uk-button-danger uk-border-pill" v-if="isLogged">BUAT
                            CAMPAIGN</router-link>
                    </div>
                    <div class="uk-text-center uk-hidden@s">
                        <router-link to="/create" tag="button" class="uk-button uk-button-danger uk-button-large" v-if="isLogged">BUAT
                            CAMPAIGN</router-link>
                    </div>
                </div>
            </div>
            <div class="uk-width-expand uk-margin-small-top uk-margin-medium-bottom">
                <form>
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip uk-icon" data-uk-icon="icon: search"></span>
                        <input @keyup="ShowFilter()" v-model="txSearch" class="uk-input uk-width-1-1 uk-border-pill"
                            placeholder="Cari Campaign .." type="search">
                    </div>
                </form>
            </div>
            <div class="uk-grid uk-grid-medium uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-6@xl uk-grid-match js-filter uk-flex-top uk-flex-wrap-top uk-sortable"
                data-uk-grid="masonry: true" data-uk-sortable="handle: .drag-icon" style="height: 2538px;">
                <CardData v-for="campaign in filterCampaigns" :key="campaign.id" :item="campaign" />
            </div>
        </div>
    </section>
    <!-- /card-->
</template>

<script>
    import CardData from '../components/CardData.vue'
    import {
        mapState,
        mapActions
    } from 'vuex'
    import {
        routes
    } from '../service/home/routes';
    import Auth from '../auth.js';

    export default {
        name: "card-list",
        components: {
            CardData
        },
        props: {},
        data() {
            return {
                filterCampaigns: [],
                txSearch: ''
            }
        },
        computed: {
            ...mapState({
                campaigns: state => state.Campaign.campaigns,
                isLogged: state => state.LoggedUser.isLoggedIn
            })
        },

        methods: {
            ...mapActions({
                getCampaigns: 'Campaign/getCampaigns'
            }),
            ShowFilter() {
                if (this.txSearch.trim() === '') {
                    this.filterCampaigns = this.campaigns;
                } else {
                    var vcampaigns = this.campaigns;
                    var makeQuery = function filterItems(query) {
                        return vcampaigns.filter(function (el) {
                            return el.title.toLowerCase().indexOf(query.toLowerCase()) > -1;
                        })
                    }

                    this.filterCampaigns = makeQuery(this.txSearch)
                }
            }
        },

        async created() {
            await this.getCampaigns();
            this.filterCampaigns = this.campaigns;
        }
    }

</script>

<style scoped>
    .can-click {
        cursor: pointer;
    }

</style>
