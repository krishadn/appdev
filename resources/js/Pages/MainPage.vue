<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Carousel from '@/Components/Carousel.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },

});
</script>



<template>
    <!-- <nav class="bg-custom-green fixed top-0 z-50 w-full border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700"> -->
    <nav class="bg-custom-green fixed top-0 z-50 w-full flex items-center justify-between px-6 py-3">
        <div class="flex items-center">
            <img src="bus_logo.png" alt="Logo" class="h-12 w-10 mr-3" />
        <div>
            <span class="text-2xl font-semibold text-black">Buzzline Transit, Inc.</span>
        </div>
        </div>
        
        <div>
            <a href="#" class="text-black font-bold mr-4 hover:underline hover:text-yellow-100">Home</a>
            <a href="#" class="text-black font-bold mr-4 hover:underline hover:text-yellow-100">About Us</a>
            <a href="#" class="text-black font-bold hover:underline hover:text-yellow-100">Contacts</a>
        </div>
    </nav>

       

    <!-- GRADIENT LANG ITO -->

    <!-- <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center"> -->
    <!-- <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true"> -->
    <!-- <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div> -->
    <!-- </div> -->
    <!-- <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true"> -->
    <!-- <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div> -->
  <!-- </div> -->

  <!-- GRADIENT LANG ITO -->



            <!-- TAGLINE -->
    <!-- TAGLINE -->
    <div class="relative isolate overflow-hidden bg-white-900 py-24 sm:py-32" style="margin-top: 60px;">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 flex">
        <div class="mx-auto max-w-2xl lg:mx-0 order-2 lg:order-1">
            <h2 class="text-4xl font-bold tracking-tight text-black sm:text-6xl">To Infinity and Beyond your Expectations!</h2>
            <p class="mt-6 text-lg leading-8 text-black-300 sm:text-xl">Hop on board and let us take you where you need to go! 
                <br>Because at Buzzline Transit, we go beyond your expectations.
            </p>
        </div>
        <img src="bus_image.png" alt="Bus Image" class="w-full lg:flex order-1 lg:order-2"> 
    </div>

        
         
            <!-- FOR BUTTONS OF BOOKING AND SIGN UP -->
        <div class="flex items-center mt-20 ml-105 lg:flex">
            <div v-if="canLogin" class="p-6 text-left">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="font-semibold text-2xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Dashboard
                </Link>

    <template v-else>
                <Link
                    :href="route('login')"
                    class="bg-custom-log text-white font-bold py-2 px-4 rounded mr-2">
                    Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="bg-custom-register text-white font-bold py-2 px-4 rounded ml-2">
                    Register
                </Link>
        </template>
    </div>
</div>
</div>
</template>



<style>
.bg-custom-green, .bg-custom-log {
    background-color: #89D036;
}

.bg-custom-register {
    background-color: #8952B0;
}
</style>