<template>
    <div class="container" id="pdfthisshit">
        <h5>Latest Donation</h5>
        <a class="waves-effect waves-light btn" @click="DownloadPDF">Download</a>
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Donors</th>
                        <th>Campaign</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="donationSHIT" v-for="donation in formattedDonation" :key="donation.id">
                        <td v-html="donation.donors"></td>
                        <td v-html="donation.campaign"></td>
                        <td>Rp {{ donation.amount }}</td>
                        <td v-html="donation.status"></td>
                        <td><img :src="donation.proof"></td>
                        <td>
                            <a class="blue darken-3 btn" @click="verifyHandler(donation.id)">Verify</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import {
        mapState,
        mapActions
    } from 'vuex'
    import jsPDF from 'jspdf'
    import html2canvas from 'html2canvas'

    export default {
        computed: {
            ...mapState({
                donations: state => state.Donation.donations
            }),

            formattedDonation() {
                return this.donations.map(item => {
                    item.status = item.status === 0 ? 'Not verified' : 'Verified'
                    item.proof = '/storage/app/' + item.proof
                    return item
                })
            }
        },

        methods: {
            ...mapActions({
                verifyDonation: 'Donation/verify'
            }),

            verifyHandler(id) {
                try {
                    this.verifyDonation(id)
                    console.log("berhasil")
                } catch (err) {
                    console.log(err)
                }
            },
            DownloadPDF() {
                var doc = new jsPDF();

                const filename = 'BikinReporrt.pdf';

                html2canvas(document.querySelector('#pdfthisshit')).then(canvas => {
                    let margins = {
                        top: 40,
                        bottom: 60,
                        left: 40,
                        width: 522
                    };
                    let pdf = new jsPDF('p', 'mm', 'a4');
                    pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
                    pdf.save(filename);
                });
            }
        }
    }

</script>

<style scoped>
    .p5 {
        padding: 0 50px;
    }

</style>
