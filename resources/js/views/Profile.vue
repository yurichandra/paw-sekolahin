<template>
    <div style="background-image: url(images/pattern.png)">
        <HeroBlock />
        <UserEdit v-if="Detail==0"/>
        <TableEdit jenis="Campaign" :table="['Nama', 'Target', 'Pencapaian', 'Aksi']" v-else-if="Detail==1"/>
        <TableEdit jenis="Donasi" :table="['Nama', 'Deskripsi', 'Status', 'Aksi']" v-else-if="Detail==2"/>
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
        },
        computed: {
            Detail() {
                console.log(this.$route.params);
                var param = this.$route.params.profile_type;
                if (param == "akun")
                    return 0;
                else if (param == "campaign")
                    return 1;
                else if (param == "donasi")
                    return 2;
                else
                    return 3;
            }
        }

    }

</script>
