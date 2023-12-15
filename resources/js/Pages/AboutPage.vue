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

    <div class="my-36">
        <div class="mx-auto max-w-7xl flex justify-evenly">
        <div class="mx-auto max-w-2xl lg:mx-0 order-2 lg:order-1 border-4 border-brand-green p-8">
            <h2 class="text-4xl font-bold tracking-tight text-black sm:text-6xl">Who We Are</h2>
            <p class="mt-6 text-lg leading-8 text-black-300 sm:text-xl"> 
                Buzzline Transit, Inc. is a pioneering transportation company dedicated to providing safe, reliable, and comfortable travel experiences. With a legacy spanning over four decades, we've been at the forefront of the transportation industry, connecting people across regions with our extensive network of bus services.    
            </p>
        </div>
        <div class="mx-auto max-w-2xl lg:mx-0 order-2 lg:order-1 border-4 border-brand-purple p-8">
            <h2 class="text-4xl font-bold tracking-tight text-black sm:text-6xl">Our History</h2>
            <p class="mt-6 text-lg leading-8 text-black-300 sm:text-xl"> 
                Established in 2020 by visionary entrepreneur Buzz Lightyear, Buzzline Transit started as a small-scale operation with a singular mission: to redefine the travel experience for commuters. Through years of commitment and dedication, the company expanded its fleet, coverage, and services, solidifying its position as a leader in the transportation sector.
            </p>
        </div>
        </div>
        <div class="mx-auto max-w-7xl mt-2 flex justify-evenly">
            <div class="mx-auto max-w-2xl lg:mx-0 order-2 lg:order-1 border-4 border-brand-purple p-8">
                <h2 class="text-4xl font-bold tracking-tight text-black sm:text-6xl">Our Values</h2>
                <p class="mt-6 text-lg leading-8 text-black-300 sm:text-xl"> 
                    At Buzzline Transit, our core values are deeply rooted in customer satisfaction, safety, and community engagement. We prioritize passenger comfort and safety above all else, ensuring every journey is not just a trip but an experience to remember.
                </p>
            </div>
            <div class="mx-auto max-w-2xl lg:mx-0 order-2 lg:order-1 border-4 border-brand-green p-8">
                <h2 class="text-4xl font-bold tracking-tight text-black sm:text-6xl">Our Services</h2>
                <p class="mt-6 text-lg leading-8 text-black-300 sm:text-xl"> 
                    From daily commuter routes to specialized charter services for events and corporate clients, Buzzline Transit offers a diverse range of transportation solutions. Our modern fleet, equipped with cutting-edge technology and amenities, ensures a seamless and enjoyable travel experience for all passengers.
                </p>    
            </div>
        </div>
    </div>

    <Footer />

</template>