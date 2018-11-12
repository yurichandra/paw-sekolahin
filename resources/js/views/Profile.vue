<template>
    <div style="background-image: url(images/pattern.png)">
        <Header />
        <HeroBlock />
        <ProfileEdit />
        <Footer />
    </div>
</template>

<script>
    // @ is an alias to /src
    import Header from '../components/Header.vue'
    import HeroBlock from '../components/HeroBlock.vue'
    import ProfileEdit from '../components/ProfileEdit.vue'
    import Footer from '../components/Footer.vue'

    export default {
        name: 'Profile',
        components: {
            Header,
            HeroBlock,
            ProfileEdit,
            Footer
        }
    }

</script>
