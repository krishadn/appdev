<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Carousel from '@/Components/Carousel.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';




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
    <div class="bg-custom-green fixed top-0 z-50 w-full flex items-center justify-between px-6 py-3">
        <div class="flex items-center">
            <img src="bus_logo.png" alt="Logo" class="h-24 mr-3" />
        <div>
            <span class="text-2xl font-semibold text-black">Buzzline Transit, Inc.</span>
        </div>
        </div>
        
        <div>
            <a href="#" class="text-black font-bold mr-4 hover:underline hover:text-yellow-100">Home</a>
            <a href="#" class="text-black font-bold mr-4 hover:underline hover:text-yellow-100">About Us</a>
            <a href="#" class="text-black font-bold hover:underline hover:text-yellow-100">Contacts</a>
        </div>
    </div>

    <!-- TAGLINE -->
    <div class="flex flex-col min-h-screen">
        <div class="flex-grow">
            <div class="flex">
            <!-- Left div for the tagline -->
            <div class="w-3/4 mt-60 ml-20">
                <h2 class="text-4xl font-bold tracking-tight text-black sm:text-6xl">To Infinity and Beyond your Expectations!</h2>
                <p class="mt-6 text-lg leading-8 text-black-300 sm:text-2xl">Hop on board and let us take you where you need to go! 
                    <br>Because at Buzzline Transit, we go beyond your expectations.
                </p>
                
            
            <!-- Login and Register buttons -->
            <div class="flex items-center justify-center mt-4 md:mt-10">
                <div v-if="canLogin" class="p-6 text-left">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="font-semibold text-2xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-black focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Dashboard
                    </Link>

            <template v-else>
                <!-- LOGIN  -->
                <Link
                    :href="route('login')"
                    class="bg-custom-log bg-hover text-white font-bold py-2 px-4 rounded mr-2 text-lg sm:text-xl md:text-2xl lg:text-3xl hover:bg-brand-green">
                    Log in
                </Link>

                <!-- REGISTER -->
                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="bg-custom-register text-white font-bold py-2 px-4 rounded ml-2 text-lg sm:text-xl md:text-2xl lg:text-3xl hover:bg-brand-purple">
                    Register
                </Link>

            </template>
        </div>
    </div>
</div>

            <!-- Right div for the company picture -->
            <div class="flex justify-center md:w-1/2 mt-4 md:mt-40">
                <img src="bus_pic.png" alt="Company Picture">
            </div>
            </div>
        </div>
    </div>

    <!-- CAROUSEL -->
    <div class="flex justify-center">
        <Carousel>

        </Carousel>
    </div>

    <!-- FOOTER -->
    <div class="w-full bg-white flex flex-col flex-shrink-0 justify-center items-center h-20 shadow-md shadow-gray-900">
    <p className="text-black sm:text-2xl font-semibold">
        Follow us on our socials!
    </p>
    <!-- Social Media Icons -->
    <div className="flex space-x-5">
        <font-awesome-icon :icon="['fab', 'instagram']" size="2x" />
        <font-awesome-icon :icon="['fab', 'facebook']" size="2x" />
        <font-awesome-icon :icon="['fab', 'twitter']" size="2x" />
    </div>
</div>
</template>



<style>
.bg-custom-green {
    background-color: #89D036;
}


.bg-custom-log {
    background-color: white;
    border: 2px solid #89D036;
    color: black;
     
}

.bg-custom-register {
    background-color: white;
    border: 2px solid #8952B0;
    color: black;
}
</style>