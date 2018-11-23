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
                    <td>
                        <a class="waves-effect waves-light btn">Verify</a>
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

                    return item
                })
            }
        },
    }
</script>

<style scoped>
    .p5 {
        padding: 0 50px;
    }
</style>

