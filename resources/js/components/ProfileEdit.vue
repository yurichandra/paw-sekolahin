<template>
    <section class="uk-section uk-section-default uk-box-shadow-small uk-section-xsmall">
        <div class="uk-container">
            <div data-uk-grid="">
                <StickyMenu />
                <!-- ISI -->
                <div class="uk-width-4-5">
                    <h2 class="uk-heading-divider">Akun Saya</h2>
                    <form class="uk-form-horizontal">
                        <fieldset class="uk-fieldset">

                            <legend class="uk-legend">Legend</legend>

                            <div class="uk-margin">
                                <label class="uk-form-label">Nama</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" placeholder="Input">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">Nomor KTP</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" placeholder="Input">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">Nomor HP</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" placeholder="Input">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">Email</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" placeholder="Input">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Deksripsi Anda</label>
                                <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                            </div>
                            <div class="uk-margin">
                                <input class="uk-button" type="button" value="Simpan"/>
                            </div>

                        </fieldset>
                    </form>
                    <div id="batas"></div>
                </div>
                <!-- ISI -->
            </div>
        </div>
    </section>
</template>

<script>
    import StickyMenu from '../components/StickyMenu.vue'
    import CampaignForm from '../components/CampaignForm.vue'
    export default {
        name: "ProfileEdit",
        components: {
            StickyMenu,
            CampaignForm
        },
        props: {}
    }

</script>

<style>

</style>
