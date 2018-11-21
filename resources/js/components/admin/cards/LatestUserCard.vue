<template>
    <div class="card">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
            </thead>

            <tbody>
                <tr
                    v-for="user in users.slice(0, 4)"
                    :key="user.id">
                    <td v-html="user.id"></td>
                    <td v-html="user.name"></td>
                    <td v-html="user.email">$0.87</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            users: {
                required: true,
                type: Array
            }
        }
    }
</script>

