<template>
    <section class="uk-section uk-section-default uk-box-shadow-small uk-section-xsmall">
        <div class="uk-container">
            <div data-uk-grid="">
                <StickyMenu />

                <!-- ISI -->
                <div class="uk-width-4-5">
                    <h2 class="uk-heading-divider">{{ jenis }} Saya</h2>
                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>{{ table[0] }}</th>
                                <th>{{ table[1] }}</th>
                                <th>{{ table[2] }}</th>
                                <th>{{ table[3] }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <Row />
                        </tbody>
                    </table>
                    <div id="batas"></div>
                </div>
                <!-- ISI -->

            </div>
        </div>
    </section>
</template>

<script>
    import Row from '../components/TableRow.vue'
    import StickyMenu from '../components/StickyMenu.vue'

    export default {
        name: "profile-table",
        props:{
            jenis: String,
            table: Array
        },
        components: {
            Row,
            StickyMenu
        }
    }

</script>

<style>

</style>
