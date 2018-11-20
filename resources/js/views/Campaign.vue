<template>
  <div class="campaign" style="background-image: url(images/pattern.png)">
    <CardList/>
    <LoginForm />
  </div>
</template>

<script>
  import Header from '../components/Header.vue'
  import Footer from '../components/Footer.vue'
  import CardList from '../components/CardList.vue'
  import LoginForm from '../components/LoginForm.vue'

  export default {
    name: 'campaign',
    components: {
      Header,
      CardList,
      Footer,
      LoginForm
    }
  }

</script>

<style>

</style>
