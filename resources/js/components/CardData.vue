<template>
    <!-- card -->
    <div class="sd-card uk-first-column" style="transform: translateY(0px);">
        <div class="uk-card uk-card-small uk-card-default">
            <div class="uk-card-header">
                <div class="uk-grid uk-grid-small uk-text-small" data-uk-grid="">
                    <div class="uk-width-expand uk-first-column">
                        <span class="cat-txt">Semua</span>
                    </div>
                    <div class="uk-width-auto uk-text-right uk-text-muted">
                        <span data-uk-icon="icon:clock; ratio: 0.8" class="uk-icon"></span>
                        <span v-html="DiffDate"></span>
                    </div>
                </div>
            </div>
            <div class="uk-card-media">
                <div class="uk-inline-clip uk-transition-toggle" tabindex="0">
                    <img class="lazy" data-src="https://picsum.photos/400/300/?random=5" data-width="400" data-height="300"
                        data-uk-img="" alt="" src="https://picsum.photos/400/300/?random=5">
                    <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-primary">
                        <span data-uk-icon="icon:lifesaver; ratio: 0.8" class="uk-icon"></span>
                        Rp {{ item.target }}
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <h6 class="uk-margin-small-bottom uk-margin-remove-adjacent uk-text-bold">
                    <router-link
                        v-html="item.title"
                        :to="{name: 'campaign-detail', params: {id: item.id}}"></router-link>
                </h6>
                <p class="uk-text-small uk-text-muted" v-html="item.body"></p>
            </div>
            <div class="uk-card-footer">
                <div class="uk-grid uk-grid-small uk-grid-divider uk-flex uk-flex-middle" data-uk-grid="">
                    <div class="uk-width-expand uk-text-small uk-first-column">
                        {{ item.school.name }}
                    </div>
                    <div class="uk-width-auto uk-text-right" v-html="DiffTarget">
                        50%
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
        props: {
            item: Object
        },
        computed: {
            DiffDate() {
                var crdate = new Date(Date.now());
                var endate = new Date(this.item.date);
                var timeDiff = Math.abs(endate.getTime() - crdate.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                if (crdate > endate)
                    return "Out of day";
                else
                    return diffDays + "day";
            },
            DiffTarget() {
              var value = this.item.raised/this.item.target;
              return Math.ceil(value * (100/100)) + "%"
            }
        }
    }

</script>

<style>

</style>
