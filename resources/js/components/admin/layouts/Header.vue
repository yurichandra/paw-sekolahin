<template>
    <div>
        <nav class="blue darken-1">
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="hide-on-med-and-down">
                    <li><a href="#">Dashboard</a></li>
                    <li><router-link to="/admin/users">Users</router-link></li>
                    <li><a href="#">Donations</a></li>
                    <li><a href="#">Campaigns</a></li>
                    <li><a href="#">Schools</a></li>
                    <li class="right"><a href="#" class="right">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<style scoped>
    .brand-logo{
        font-size: 16px;
    }
</style>

