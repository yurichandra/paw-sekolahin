<template>
    <!-- BOTTOM BAR -->
    <div class="uk-section uk-section-xsmall uk-section-default uk-position-bottom uk-position-fixed" style="border-top: 1px solid #f2f2f2">
        <div class="uk-container uk-container-small uk-text-small">
            <div class="uk-grid" data-uk-grid="">
                <div class="uk-width-expand uk-first-column">
                    <a href="#" class="uk-link-reset">
                        <span data-uk-icon="icon: arrow-right" class="uk-icon"></span>
                        <strong>{{ Detail }}</strong>
                        <span class="uk-visible@s">- Target Terpenuhi</span></a>
                </div>
                <div class="uk-width-auto uk-text-right">
                    <button class="uk-button uk-button-danger uk-border-pill uk-button-small" @click="ShowModal">
                        DONASI</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /BOTTOM BAR -->
</template>

<script>
    export default {
        name: "bottom-bar",
        props:{
            target_root: String,
            raised_root: String
        },
        methods: {
            ShowModal() {
                var element = document.getElementById("modal-sections");
                UIkit.modal(element).show();
            }
        },
        computed: {
            Detail(){
                return this.raised_root + "/" + this.target_root;
            }
        }
    }

</script>

<style>

</style>
