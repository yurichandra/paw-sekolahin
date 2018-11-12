<template>
    <div>
        <div class="card col s12 m12 m5">
            <h6>Add new school</h6>
            <div class="row">
                <form class="col m12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="email"
                                type="email"
                                class="validate">
                            <label for="email">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="password"
                                type="password"
                                class="validate">
                            <label for="password">Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                id="telephone"
                                type="text"
                                class="validate">
                            <label for="telephone">Telephone</label>
                        </div>
                    </div>
                </form>
            </div>
            <a class="blue darken-3 btn">Add New School</a>
        </div>
        <div class="p5">
            <h5>Schools</h5>
            <a class="waves-effect blue darken-3 btn">Download</a>
        </div>
        <div class="card col s12 m12 m5">
             <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Alvin</td>
                    <td>Eclair</td>
                    <td>
                        082125315898
                    </td>
                    <td>
                        <a class="waves-effect waves-light btn">Update</a>
                        <a class="waves-effect red accent-4 btn">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>Alan</td>
                    <td>Jellybean</td>
                    <td>082125315898</td>
                    <td>
                        <a class="waves-effect waves-light btn">Update</a>
                        <a class="waves-effect red accent-4 btn">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>Jonathan</td>
                    <td>Lollipop</td>
                    <td>082125315898</td>
                    <td>
                        <a class="waves-effect waves-light btn">Update</a>
                        <a class="waves-effect red accent-4 btn">Delete</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
</script>

<style scoped>
    .m5 {
        margin: 10px 50px;
        padding: 15px;
    }

    .p5 {
        padding: 0 50px;
    }
</style>

