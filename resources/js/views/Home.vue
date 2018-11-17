<template>
    <div class="home" style="background-image: url(images/pattern.png)">
        <HeroImage />
        <CampaignList />
        <LoginForm />
        <HomeSection />
    </div>
</template>

<script>
    // @ is an alias to /src
    import HeroImage from '../components/HeroImage.vue'
    import CampaignList from '../components/SlideList.vue'
    import HomeSection from '../components/HomeSection.vue'
    import LoginForm from '../components/LoginForm.vue'

    export default {
        name: 'home',
        components: {
            HeroImage,
            LoginForm,
            CampaignList,
            HomeSection
        }
    }

</script>
