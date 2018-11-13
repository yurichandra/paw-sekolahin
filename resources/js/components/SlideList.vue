<template>
  <!-- NewCampaign -->
  <div class="uk-container uk-margin-medium-bottom">
    <h1 class="uk-text-capitalize">campaign terbaru</h1>
    <div data-uk-slider="velocity: 5" class="uk-slider">
      <div class="uk-position-relative">
        <div class="uk-slider-container">
          <ul class="uk-slider-items uk-child-width-1-2@m uk-grid uk-grid-medium news-slide" style="transform: translateX(0px);">
            <li class="uk-active">
              <div class="uk-card uk-card-default uk-card-body uk-card-small uk-flex uk-flex-middle uk-card-default uk-border-rounded">
                <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle" data-uk-grid="">
                  <div class="uk-width-1-3@s uk-width-2-5@m uk-height-1-1 uk-first-column">
                    <img src="https://picsum.photos/500/500/?random=1" alt="">
                  </div>
                  <div class="uk-width-2-3@s uk-width-3-5@m">
                    <span class="uk-label uk-label-warning" style="font-size: 0.75rem">Trends</span>
                    <h3 class="uk-card-title uk-margin-small-top uk-margin-remove-bottom">
                      <a class="uk-link-reset" href="#">Short Blog Title</a>
                    </h3>
                    <span class="uk-article-meta">Published 12th August 2018</span>
                    <p class="uk-margin-small">Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit, sed do...</p>
                  </div>
                </div>
              </div>
            </li>
            <li class="uk-active">
              <div class="uk-card uk-card-default uk-card-body uk-card-small uk-flex uk-flex-middle uk-card-default uk-border-rounded">
                <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle" data-uk-grid="">
                  <div class="uk-width-1-3@s uk-width-2-5@m uk-height-1-1 uk-first-column">
                    <img src="https://picsum.photos/500/500/?random=2" alt="">
                  </div>
                  <div class="uk-width-2-3@s uk-width-3-5@m">
                    <span class="uk-label uk-label-warning" style="font-size: 0.75rem">Trends</span>
                    <h3 class="uk-card-title uk-margin-small-top uk-margin-remove-bottom">
                      <a class="uk-link-reset" href="#">Short Blog Title</a>
                    </h3>
                    <span class="uk-article-meta">Published 12th August 2018</span>
                    <p class="uk-margin-small">Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit, sed do...</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="uk-hidden@l uk-light">
          <a class="uk-position-center-left uk-position-small uk-slidenav-previous uk-icon uk-slidenav" href="#"
            data-uk-slidenav-previous="" data-uk-slider-item="previous"><svg width="14" height="24" viewBox="0 0 14 24"
              xmlns="http://www.w3.org/2000/svg">
              <polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline>
            </svg></a>
          <a class="uk-position-center-right uk-position-small uk-slidenav-next uk-icon uk-slidenav" href="#"
            data-uk-slidenav-next="" data-uk-slider-item="next"><svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg">
              <polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline>
            </svg></a>
        </div>
        <div class="uk-visible@l">
          <a class="uk-position-center-left-out uk-position-small uk-slidenav-previous uk-icon uk-slidenav" href="#"
            data-uk-slidenav-previous="" data-uk-slider-item="previous"><svg width="14" height="24" viewBox="0 0 14 24"
              xmlns="http://www.w3.org/2000/svg">
              <polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline>
            </svg></a>
          <a class="uk-position-center-right-out uk-position-small uk-slidenav-next uk-icon uk-slidenav" href="#"
            data-uk-slidenav-next="" data-uk-slider-item="next"><svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg">
              <polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline>
            </svg></a>
        </div>
      </div>
      <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">
        <li uk-slider-item="0" class="uk-active"><a href="#"></a></li>
        <li uk-slider-item="1"><a href="#"></a></li>
      </ul>
    </div>
  </div>
  <!-- /NewCampaign -->
</template>

<script>
  export default {
    name: 'SlideList',
    props: {}
  }

</script>

<style>

</style>
