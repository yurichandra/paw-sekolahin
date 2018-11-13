<template>
  <div class="campaign" style="background-image: url(images/pattern.png)">
    <LoginForm />
  </div>
</template>

<script>
  import Header from '../components/Header.vue'
  import Footer from '../components/Footer.vue'
  import LoginForm from '../components/LoginForm.vue'

  export default {
    name: 'login',
    components: {
      Header,
      LoginForm,
      Footer
    }
  }

</script>

<style>

</style>
