<template>
    <section class="uk-section uk-section-default uk-box-shadow-small uk-section-xsmall">
        <div class="uk-container">
            <div data-uk-grid="">
                <StickyMenu />
                <div class="uk-width-4-5" v-if="campaigns">
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
                            <tr v-for="campaign in campaigns" :key="campaign.id">
                                <td v-html="campaign.title"></td>
                                <td>Rp {{ campaign.target }}</td>
                                <td>Rp {{ campaign.raised }}</td>
                                <td>
                                    <router-link class="uk-button uk-button-primary" :to="{name: 'campaign-detail', params: {campaign_id: campaign.id}}">View</router-link>
                                    <router-link class="uk-button uk-button-primary" :to="{name: 'campaign-edit', params: {id: campaign.id}}">Edit</router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="batas"></div>
                </div>

                <div class="uk-width-4-5" v-if="donations">
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
                            <tr v-for="donation in donations" :key="donation.id">
                                <td v-html="donation.donors"></td>
                                <td>Rp {{ donation.amount }}</td>
                                <td v-html="StatusString(donation.status)"></td>
                                <td>
                                    <input type="submit" class="uk-button uk-button-primary" value="Upload proof"
                                        @click="ShowUpload(donation.id)" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="batas"></div>
                </div>
                <!-- ISI -->

            </div>
        </div>
        <div id="my-id" uk-modal bgclose="false">
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close" type="button"></button>
                <vue-dropzone ref="myVueDropzone" id="dropzone" :options="options" @vdropzone-processing="dropzoneChangeUrl"
                    v-on:vdropzone-sending="sendingEvent" v-on:vdropzone-error="verr"></vue-dropzone>
            </div>
        </div>

    </section>
</template>

<script>
    import Row from '../components/TableRow.vue'
    import StickyMenu from '../components/StickyMenu.vue'
    import vue2Dropzone from 'vue2-dropzone'
    import Vue from 'vue'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        name: "profile-table",
        props: {
            campaigns: {
                type: Array
            },
            donations: {
                type: Array
            },
            jenis: {
                type: String
            },
            table: {
                type: Array
            }
        },
        data: function () {
            return {
                id: 0,
                Uploadable: false
            }
        },
        components: {
            Row,
            vueDropzone: vue2Dropzone,
            StickyMenu
        },

        computed: {
            options() {
                var dropzoneOptions = {
                    url: 'http://localhost:8000/api/upload-proof/' + this.id,
                    thumbnailWidth: 150,
                    maxFilesize: 20,
                    headers: {
                        "My-Awesome-Header": "header value"
                    }
                }
                return dropzoneOptions
            }
        },

        methods: {
            ShowUpload(id) {
                this.id = id
                var element = document.getElementById("my-id");
                UIkit.modal(element).show();
            },
            StatusString(status) {
                return status == 0 ? "Unverified" : " Verified"
            },
            verr(file, message, xhr) {
                console.log("Message VSingle:", message);
            },
            verrmultiple(files, message, xhr) {
                console.log("Message VMulti:", message);
            },
            thumbnail(file, dataUrl) {
                console.log("thumbnail", dataUrl)
            },
            sendingEvent(file, xhr, formData) {
                console.log(this.$refs)
                formData.append('userId', this.id);
                formData.append('photo', file);
            },
            dropzoneChangeUrl() {
                console.log("id", this.id)
                this.$refs.myVueDropzone.setOption('url', 'http://localhost:8000/api/upload-proof/' + this.id, )
            },
        }
    }

</script>

<style>

</style>
