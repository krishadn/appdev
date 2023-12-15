<script setup>
import { Link } from '@inertiajs/vue3';
import Footer from '@/Components/Footer.vue'
</script>


<template>
    <div class="bg-custom-green fixed top-0 z-50 w-full flex items-center justify-between px-6 py-3">
        <div class="flex items-center">
            <img src="bus_logo.png" alt="Logo" class="h-12 w- mr-3" />
        <div>
            <span class="text-2xl font-semibold text-black">Buzzline Transit, Inc.</span>
        </div>
        </div>
        
        <div>
            <Link href="/" class="text-black font-bold mr-4 hover:underline hover:text-yellow-100">Home</Link>
            <Link href="/about" class="text-black font-bold mr-4 hover:underline hover:text-yellow-100">About Us</Link>
            <Link href="/contact" class="text-black font-bold hover:underline hover:text-yellow-100">Contacts</Link>
        </div>
    </div>

    <div class="flex mb-20">
        <!-- Left div for the tagline -->
        <div class="w-3/4 mt-60 ml-20">
            <h2 class="text-6xl font-bold tracking-tight text-brand-purple sm:text-6xl">Contact Us</h2>
            <div class="mt-10">
                <h3 class="text-2xl font-bold tracking-tight text-brand-purple sm:text-2xl">Address</h3>
                <p class="mt-2 text-xl leading-8 text-black-300 sm:text-xl">123 Buzzline Avenue, Makati City, Metro Manila, Philippines
            </p>
            </div>
            <div class="mt-10">
                <h3 class="text-2xl font-bold tracking-tight text-brand-purple sm:text-2xl">Contact Number</h3>
                <p class="mt-2 text-xl leading-8 text-black-300 sm:text-xl">Local: (02) 123-4567
                    <br/>
                    Toll-Free: 1800-BUZZLINE
            </p>
            </div>

            <div class="mt-10">
                <h3 class="text-2xl font-bold tracking-tight text-brand-purple sm:text-2xl">Social Media</h3>
                <p class="mt-2 text-xl leading-8 text-black-300 sm:text-xl">Facebook: Buzzline Transit Facebook Page
                    <br/>Twitter: @BuzzlineTransit
                    <br/>Instagram: @buzzline_transit
            </p>
            </div>

            <div class="mt-10">
                <h3 class="text-2xl font-bold tracking-tight text-brand-purple sm:text-2xl">Operating Hours</h3>
                <p class="mt-2 text-xl leading-8 text-black-300 sm:text-xl">Monday - Friday: 8:00 AM to 8:00 PM
                    <br/>Saturday - Sunday: 9:00 AM to 5:00 PM
            </p>
            </div>

            <div class="mt-10">
                <h3 class="text-2xl font-bold tracking-tight text-brand-purple sm:text-2xl">Customer Support</h3>
                <p class="mt-2 text-xl leading-8 text-black-300 sm:text-xl">For inquiries, feedback, or assistance, our customer support team is available during operating hours to assist you promptly.
            </p>
            </div>
            
            <div class="mt-10">
                <h3 class="text-2xl font-bold tracking-tight text-brand-purple sm:text-2xl">Corporate Office</h3>
                <p class="mt-2 text-xl leading-8 text-black-300 sm:text-xl">Buzzline Transit, Inc.Monday - Friday: 8:00 AM to 8:00 PM
                    <br/>Corporate Headquarters
                    <br/>123 Buzzline Tower, Ortigas Center,
                    <br/>Pasig City, Metro Manila
            </p>
            </div>
            


           
        </div>

        <!-- Right div for the company picture -->
        <div class="w-1/2 mt-40">
            <img src="bus_pic.png" alt="Company Picture">
        </div>
    </div>

    <Footer />

</template>