<template>
    <div class="home" style="background-image: url(images/pattern.png)">
        <HeroImage />
        <CampaignList />
        <HomeSection />
    </div>
</template>

<script>
    // @ is an alias to /src
    import Header from '../components/Header.vue'
    import HeroImage from '../components/HeroImage.vue'
    import CampaignList from '../components/SlideList.vue'
    import HomeSection from '../components/HomeSection.vue'
    import Footer from '../components/Footer.vue'

    export default {
        name: 'home',
        components: {
            Header,
            HeroImage,
            CampaignList,
            HomeSection,
            Footer
        }
    }

</script>
