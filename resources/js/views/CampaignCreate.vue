<template>
  <div class="campaign-create" style="background-image: url(images/pattern.png)">
    <Form/>
    <LoginForm />
  </div>
</template>

<script>
  import Form from '../components/CampaignForm.vue'
  import LoginForm from '../components/LoginForm.vue'

  export default {
    name: 'campaign-create',
    components: {
      Form,
      LoginForm
    }
  }

</script>

<style>

</style>

