<template>
    <!--ARTICLE-->
    <section class="uk-section uk-article">
        <Detail :judul="judul_root" :deskripsi="deskripsi_root" :tanggal="tanggal_root"/>
        <Progress :target="target_root" :raised="raised_root" :tanggal="tanggal_root"/>
    </section>
    <!--/ARTICLE-->
</template>

<script>
    import Picture from '../components/Picture.vue'
    import Detail from '../components/ArticleDetail.vue'
    import Progress from '../components/ArticleProgress.vue'

    export default {
        name: "article",
        props:{
            judul_root: String,
            deskripsi_root: String,
            target_root: String,
            raised_root: String,
            tanggal_root:String
        },
        components: {
            Picture,
            Detail,
            Progress
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
