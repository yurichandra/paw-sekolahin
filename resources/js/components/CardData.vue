<template>
  <!-- card -->
  <div class="sd-card uk-first-column" style="transform: translateY(0px);">
    <div class="uk-card uk-card-small uk-card-default">
      <div class="uk-card-header">
        <div class="uk-grid uk-grid-small uk-text-small" data-uk-grid="">
          <div class="uk-width-expand uk-first-column">
            <span class="cat-txt">Sekolah Dasar</span>
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
            <span data-uk-icon="icon:heart; ratio: 0.8" class="uk-icon"></span> 12.345
            <span data-uk-icon="icon:lifesaver; ratio: 0.8" class="uk-icon"> | </span>
            Rp.50.000.000
          </div>
        </div>
      </div>
      <div class="uk-card-body">
        <h6 class="uk-margin-small-bottom uk-margin-remove-adjacent uk-text-bold">LOREM IPSUM
          SIT</h6>
        <p class="uk-text-small uk-text-muted">Duis aute irure dolor in reprehenderit in
          voluptate
          velit</p>
      </div>
      <div class="uk-card-footer">
        <div class="uk-grid uk-grid-small uk-grid-divider uk-flex uk-flex-middle" data-uk-grid="">
          <div class="uk-width-expand uk-text-small uk-first-column">
            John Doe
          </div>
          <div class="uk-width-auto uk-text-right">
            50%
          </div>
          <div class="uk-width-auto uk-text-right">
            <a href="#" data-uk-tooltip="title: Twitter" class="uk-icon-link uk-icon" data-uk-icon="icon:twitter; ratio: 0.8"
              title="" aria-expanded="false"></a>
            <a href="#" data-uk-tooltip="title: Instagram" class="uk-icon-link uk-icon" data-uk-icon="icon:instagram; ratio: 0.8"
              title="" aria-expanded="false"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /card -->
</template>

<script>
  export default {
    name: 'CardData',
    props: {}
  }

</script>

<style>

</style>
