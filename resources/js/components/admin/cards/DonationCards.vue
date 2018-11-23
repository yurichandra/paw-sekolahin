<template>
    <div>
        <div class="card orange">
            <div class="card-content">
                <span class="card-title white-text">Rp {{ total }}</span>
                <p class="white-text">Total Donasi</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            total: Number
        }
    }
</script>
