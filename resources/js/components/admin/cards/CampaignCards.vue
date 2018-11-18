<template>
    <div>
        <div class="card green">
            <div class="card-content">
                <span class="card-title white-text"> {{ count }}</span>
                <p class="white-text">Jumlah Campaign</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            count: Number
        }
    }
</script>
