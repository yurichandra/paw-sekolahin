<template>
    <!--ARTICLE-->
    <section class="uk-section uk-article">
        <Detail />
        <Progress />
    </section>
    <!--/ARTICLE-->
</template>

<script>
    import Picture from '../components/Picture.vue'
    import Detail from '../components/ArticleDetail.vue'
    import Progress from '../components/ArticleProgress.vue'

    export default {
        name: "article",
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
