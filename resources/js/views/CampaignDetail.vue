<template>
    <div>
        <div style="background-image: url(images/pattern.png)">
            <Author />
            <Article />
        </div>
        <Donation />
        <Bar />
    </div>
</template>

<script>
    import Author from '../components/AuthorDetail.vue'
    import Bar from '../components/BottomBar.vue'
    import Article from '../components/Article.vue'
    import Donation from '../components/Donation.vue'

    export default {
        name: 'campaign-detail',
        components: {
            Article,
            Author,
            Bar,
            Donation
        }
    }

</script>

<style>

</style>
