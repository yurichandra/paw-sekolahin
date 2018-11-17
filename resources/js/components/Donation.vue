<template>
    <!-- MODAL -->
        <div id="modal-sections" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-margin-auto-vertical">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">Donasi</h2>
                </div>
                <div class="uk-modal-body uk-flex uk-flex-center">
                    <form class="uk-form-stacked">

                        <div class="uk-margin">
                            <label class="uk-form-label">Pesan</label>
                            <div class="uk-inline uk-margin-auto">
                                <span class="uk-form-icon" uk-icon="icon: heart"></span>
                                <input class="uk-input uk-width-1-1" type="text">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">Jumlah Uang</label>
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: credit-card"></span>
                                <input class="uk-input uk-width-1-1" type="text">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary" type="button">Save</button>
                </div>
            </div>
        </div>
        <!-- /MODAL -->
</template>

<script>
export default {
    name: "donation"
}
</script>

<style>

</style>
