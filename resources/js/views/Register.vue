<template>
  <div class="uk-height-1-1" style="background-image: url(images/pattern.png)">
    <Register />
  </div>
</template>

<script>
  import Header from '../components/Header.vue'
  import Footer from '../components/Footer.vue'
  import Register from '../components/RegisterForm.vue'

  export default {
    name: 'login',
    components: {
      Header,
      Register,
      Footer
    }
  }

</script>

<style>

</style>
