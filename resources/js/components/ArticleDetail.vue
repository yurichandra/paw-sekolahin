<template>
    <div class="uk-container uk-container-small">
        <h2 class="uk-text-bold uk-h1 uk-margin-remove-adjacent uk-margin-remove-top">{{ judul }}</h2>
        <p class="uk-article-meta">{{ Detail }}</p>

        <p class="uk-text-lead">{{ deskripsi }}</p>
    </div>
</template>

<script>
    export default {
        name: "article-detail",
        props:{
            judul: String,
            deskripsi: String,
            tanggal: String
        },
        computed:{
            Detail(){
                return "Berakhir tanggal " + this.tanggal
            }
        }
    }

</script>

<style>

</style>
