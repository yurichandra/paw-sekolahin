<template>
    <div>
        <div class="card deep-purple">
            <div class="card-content">
                <span class="card-title white-text">{{ count }}</span>
                <p class="white-text">Jumlah Sekolah</p>
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
