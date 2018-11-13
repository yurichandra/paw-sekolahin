<template>
  <div class="campaign" style="background-image: url(images/pattern.png)">
    <CardList/>
  </div>
</template>

<script>
  import Header from '../components/Header.vue'
  import Footer from '../components/Footer.vue'
  import CardList from '../components/CardList.vue'

  export default {
    name: 'campaign',
    components: {
      Header,
      CardList,
      Footer
    }
  }

</script>

<style>

</style>
