<template>
    <div class="campaign" style="background-image: url(images/pattern.png)">
        <CardList />
        <LoginForm />
    </div>
</template>

<script>
    import CardList from '../components/CardList.vue'
    import LoginForm from '../components/LoginForm.vue'

    export default {
        name: 'campaign',
        components: {
            LoginForm,
            CardList
        }
    }

</script>

<style>

</style>
