<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>

    <div class="bg-custom-gray min-h-screen flex flex-col justify-center items-center">
        <div class="flex flex-row">
            <img src="bus_logo.png" alt="Bus Logo" class="w-96 h-96"/>
    </div>

        <div class="form-container mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        
            <slot />
        </div>
    </div>
</template>

<style>
.bg-custom-gray {
    background-color: #3E3E3E;
}

.form-container {
    width: 700px; /* Adjust as needed */
    /* max-width: 800px; Adjust as needed */
    height: 650px; /* Adjust as needed */
}
</style>
