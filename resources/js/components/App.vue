<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
    import Header from './layouts/Header.vue'

    export default {
        components: {
            'Header' : Header
        }
    }
</script>
