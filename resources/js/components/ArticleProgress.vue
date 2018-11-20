<template>
    <!-- text -->
    <div class="uk-container uk-container-small">
        <div class="uk-text-bold">
            <h2 class="uk-heading-primary uk-text-capitalize">{{ Target }}</h2>
            <h2 class="uk-heading-bullet uk-text-capitalize">{{ Raised }}</h2>
            <h3 class="uk-heading-line uk-text-center uk-text-danger"><span>{{ DiffDate }}</span></h3>
        </div>
    </div>
    <!-- text -->
</template>

<script>
    export default {
        name: "article-progress",
        props:{
            target: String,
            tanggal: String,
            raised: String
        },
        computed:{
            DiffDate() {
                var crdate = new Date(Date.now());
                var endate = new Date(this.tanggal);
                var timeDiff = Math.abs(endate.getTime() - crdate.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                if (crdate > endate)
                    return "Out of day";
                else
                    return "SISA "+ diffDays + " HARI";
            },
            Target() {
                return "Target uang, Rp." + this.target
            },
            Raised() {
                return "Terkumpul, Rp." + this.raised
            }
        },
        methods:{
            
        }
    }

</script>

<style>

</style>
