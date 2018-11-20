<template>
    <div>
        <!--AUTHOR-->
        <section class="uk-section uk-section-small">
            <div id="author-wrap" class="uk-container uk-container-small">
                <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle" data-uk-grid="">
                    <div class="uk-width-auto uk-first-column">
                        <img src="https://unsplash.it/80/80/?random" alt="" class="uk-border-circle">
                    </div>
                    <div class="uk-width-expand">
                        <h4 class="uk-margin-remove uk-text-bold">{{ nama }}</h4>
                        <span class="uk-text-small uk-text-muted">{{ Detail }}</span>
                    </div>
                </div>
            </div>
        </section>
        <!--/AUTHOR-->
        <div class="uk-container uk-container-small">
            <hr class="uk-margin-remove">
        </div>
    </div>
</template>

<script>
    export default {
        name: "author-detail",
        props:{
            nama: String,

        },
        computed: {            
            Detail(){
                return this.nama + " sudah membuat campaign ini, bantu isi target!"
            }
        },
        methods: {
            ShowModal() {
                var element = document.getElementById("modal-sections");
                UIkit.modal(element).show();
            }
        }
    }

</script>

<style>

</style>
