<template>
    <div class="uk-width-1-5">
        <div class="tm-sidebar-right uk-visible@l">
            <div uk-sticky="offset: 160; bottom:#batas; top:true" class="uk-position-z-index uk-sticky uk-active uk-sticky-fixed">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-border-circle" width="40" height="40" src="https://unsplash.it/80/80/?random">
                            </div>
                            <div class="uk-width-expand">
                                <h3 class="uk-card-title uk-margin-remove-bottom"> {{ name }}</h3>
                                <p class="uk-text-meta uk-margin-remove-top">member</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-card-body uk-text-left">
                        <ul class="uk-nav">
                            <li class="uk-active"><a href="" class="uk-button uk-button-text">Akun Saya</a></li>
                            <li><a href="" class="uk-button uk-button-text">Campaign Saya</a></li>
                            <li><a href="" class="uk-button uk-button-text">Donasi Saya</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-sticky-placeholder"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "StickyMenu",
        props: {
            name: String
        }
    }

</script>

<style>

</style>
