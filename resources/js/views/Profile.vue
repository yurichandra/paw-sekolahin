<template>
    <div style="background-image: url(images/pattern.png)">
        <HeroBlock />
        <UserEdit v-if="Detail==0"/>
        <TableEdit
            jenis="Campaign"
            :table="['Title', 'Target', 'Raised', 'Action']"
            :campaigns="campaigns"
            v-else-if="Detail==1"/>
        <TableEdit
            jenis="Donasi"
            :table="['Nama', 'Deskripsi', 'Status', 'Aksi']"
            v-else-if="Detail==2"/>
    </div>
</template>

<script>
    // @ is an alias to /src
    import HeroBlock from '../components/HeroBlock.vue'
    import UserEdit from '../components/ProfileEdit.vue'
    import TableEdit from '../components/ProfileTable.vue'
    import { mapState, mapActions, mapGetters } from 'vuex'

    export default {
        name: 'profile',

        components: {
            HeroBlock,
            UserEdit,
            TableEdit
        },

        computed: {
            ...mapState({
                campaigns: state => state.Campaign.campaigns
            }),

            ...mapGetters({
                userId : 'LoggedUser/userId'
            }),

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
        },

        methods: {
            ...mapActions({
                fetchByUser : 'Campaign/fetchByUser'
            }),
        },

        async created () {
            this.fetchByUser(this.userId)
        }

    }

</script>
