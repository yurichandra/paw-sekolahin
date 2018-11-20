<template>
  <!-- card -->
  <div class="sd-card uk-first-column" style="transform: translateY(0px);">
    <div
        class="uk-card uk-card-small uk-card-default"
        v-for="campaign in campaigns"
        :key="campaign.id">
      <div class="uk-card-header">
        <div class="uk-grid uk-grid-small uk-text-small" data-uk-grid="">
          <div class="uk-width-expand uk-first-column">
            <span class="cat-txt">Semua</span>
          </div>
          <div class="uk-width-auto uk-text-right uk-text-muted">
            <span data-uk-icon="icon:clock; ratio: 0.8" class="uk-icon"></span> 3 min.
          </div>
        </div>
      </div>
      <div class="uk-card-media">
        <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
          <img class="lazy" data-src="https://picsum.photos/400/300/?random=5" data-width="400" data-height="300"
            data-uk-img="" alt="" src="https://picsum.photos/400/300/?random=5">
          <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-primary">
            <span data-uk-icon="icon:lifesaver; ratio: 0.8" class="uk-icon"></span>
            {{ campaign.target }}
          </div>
        </div>
      </div>
      <div class="uk-card-body">
        <h6 class="uk-margin-small-bottom uk-margin-remove-adjacent uk-text-bold" v-html="campaign.title"></h6>
        <p class="uk-text-small uk-text-muted" v-html="campaign.body"></p>
      </div>
      <div class="uk-card-footer">
        <div class="uk-grid uk-grid-small uk-grid-divider uk-flex uk-flex-middle" data-uk-grid="">
          <div class="uk-width-expand uk-text-small uk-first-column">
            {{ campaign.school.name }}
          </div>
          <div class="uk-width-auto uk-text-right">
            50%
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /card -->
</template>

<script>
  import { mapState, mapActions } from 'vuex'

  export default {
    name: 'CardData',
    props: {},

    computed: {
        ...mapState({
            campaigns: state => state.Campaign.campaigns
        })
    },

    methods: {
        ...mapActions({
            getCampaigns: 'Campaign/getCampaigns'
        })
    },

    async created () {
        await this.getCampaigns()
    }
  }

</script>

<style>

</style>
