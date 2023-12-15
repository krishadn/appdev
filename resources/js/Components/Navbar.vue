<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
<nav class="fixed top-0 z-50 w-full bg-brand-green">
  <div class="px-3 py-5 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <Link href="/dashboard" class="flex ml-2 md:mr-24">
          <img src="bus_logo.png" class="h-8 mr-3" alt="FlowBite Logo" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Buzzline Transit Inc.</span>
        </Link>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-black px-5 py-3 bg-brand-cream rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 border-2 border-black" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span>{{$page.props.auth.user.name}}</span>
                <svg class="w-6 h-6 text-brand-green dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 10">
                    <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z"/>
                </svg>

                </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">

              <ul class="py-1" role="none">
                <li>
                  <Link href="/profile" class="flex px-4 py-2  text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                     <span class="px-2">
                      Profile
                      </span>
                  </Link>
                </li>
                <hr />
                <li>
                  <Link :href="route('logout')"  method="post" class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                     <span class="px-2">
                        Sign out
                    </span>
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

</template>

