<template>
  <div class="uk-height-1-1" style="background-image: url(images/pattern.png)">
    <Register />
    <LoginForm />
  </div>
</template>

<script>
  import Register from '../components/RegisterForm.vue'
  import LoginForm from '../components/LoginForm.vue'

  export default {
    name: 'register',
    components: {
      Register,
      LoginForm
    }
  }

</script>

<style>

</style>
