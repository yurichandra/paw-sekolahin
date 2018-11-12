<template>
    <!-- CreateCampaign -->
    <section class="uk-section uk-section-small">
        <div class="uk-container uk-container-small uk-hidden@s uk-background-cover" style="height: 100px; width: 100%; background-image: url(images/2.jpg)"></div>
        <div class="uk-container uk-container-small uk-background-default">
            <div data-uk-grid="">
                <div class="uk-width-1-5 uk-cover-container uk-visible@s">
                    <img src="images/2.jpg" alt="Alt img" data-uk-cover="" class="uk-cover" style="height: 462px; width: 1200px;">
                </div>
                <div class="uk-width-4-5@s uk-width-1-1 uk-margin">
                    <form class="uk-form-stacked">
                        <fieldset class="uk-fieldset">

                            <legend class="uk-legend">Legend</legend>

                            <div class="uk-margin">
                                <label class="uk-form-label">Nama</label>
                                <input class="uk-input" type="text" placeholder="Campaign ..">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Target Uang</label>
                                <input class="uk-input" type="text" placeholder="1000 ..">
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">Tanggal</label>
                                <input class="uk-input" placeholder="Date" name="date" value="" type="date">
                            </div>

                            <div class="uk-margin">
                                <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                            </div>

                            <div class="uk-margin">
                                <input class="uk-button" type="button" value="Buat Campaign">
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /CreateCampaign -->
</template>

<script>
    export default {
        name: "CampaignForm",
        props: {}
    }

</script>

<style>

</style>
