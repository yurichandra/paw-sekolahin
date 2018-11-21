<template>
    <div class="card">
        <table>
            <thead>
            <tr>
                <th>Campaign Title</th>
                <th>Raised</th>
                <th>Target</th>
            </tr>
            </thead>

            <tbody>
                <tr
                    v-for="campaign in campaigns"
                    :key="campaign.id">
                    <td v-html="campaign.title"></td>
                    <td v-html="campaign.raised"></td>
                    <td v-html="campaign.target"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            campaigns: {
                type: Array,
                required: true
            }
        }
    }
</script>

