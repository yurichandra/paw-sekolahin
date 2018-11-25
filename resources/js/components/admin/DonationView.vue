<template>
    <div class="container">
        <h5>Latest Donation</h5>
        <a class="waves-effect waves-light btn">Download</a>
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
                <tr
                    v-for="donation in formattedDonation"
                    :key="donation.id">
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
    import { mapState, mapActions } from 'vuex'

    export default {
        computed: {
            ...mapState({
                donations: state => state.Donation.donations
            }),

            formattedDonation () {
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

            verifyHandler (id) {
                try {
                    this.verifyDonation(id)
                    console.log("berhasil")
                } catch (err) {
                    console.log(err)
                }
            }
        }
    }
</script>

<style scoped>
    .p5 {
        padding: 0 50px;
    }
</style>

