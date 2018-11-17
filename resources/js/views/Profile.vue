<template>
    <div style="background-image: url(images/pattern.png)">
        <HeroBlock />
        <!-- <UserEdit /> -->
        <TableEdit />
    </div>
</template>

<script>
    // @ is an alias to /src
    import HeroBlock from '../components/HeroBlock.vue'
    import UserEdit from '../components/ProfileEdit.vue'
    import TableEdit from '../components/ProfileTable.vue'

    export default {
        name: 'profile',
        components: {
            HeroBlock,
            UserEdit,
            TableEdit
        }
    }

</script>
