<template>
    <section class="uk-section uk-section-default uk-box-shadow-small uk-section-xsmall">
        <div class="uk-container">
            <div data-uk-grid="">
                <StickyMenu />

                <!-- ISI -->
                <div class="uk-width-4-5">
                    <h2 class="uk-heading-divider">Campaign Saya</h2>
                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>Nama Campaign</th>
                                <th>Target</th>
                                <th>Pencapaian</th>
                                <th>Aksi</th>
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
        components: {
            Row,
            StickyMenu
        }
    }

</script>

<style>

</style>
