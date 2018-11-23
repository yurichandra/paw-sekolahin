<template>
    <div>
        <tr
            v-for="campaign in data"
            :key="campaign.id">
            <td v-html="campaign.title"></td>
            <td v-html="campaign.target"></td>
            <td v-html="campaign.raised"></td>
            <td>
                <button class="uk-button uk-button-primary">View</button>
                <button class="uk-button uk-button-default">Edit</button>
                <button class="uk-button uk-button-danger">Delete</button>
            </td>
        </tr>
    </div>
</template>

<script>
    export default {
        name: "table-row",

        props: {
            data: {
                type: Array
            }
        },

        created(){
            console.log(this.data)
        }
    }

</script>

<style>

</style>
