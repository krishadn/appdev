<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

const props = defineProps({
    busroutes: Object,
    successEdit: String,
    failEdit: String
})
if (props.successEdit){
        alert("Route created");
    }
    else if (props.failEdit){
        alert("Route already exist");
    }


function destroy(id){
    if (confirm('Are you sure you want to delete this Route?')) {
        router.delete(route("busroutes.destroy",id));
    }
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-3 flex justify-center">
                        <h1 class="text-2xl font-semibold">ROUTES</h1>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-3 ">
                    <Link :href="route('busroutes.create')" class="flex items-center text-white font-semibold px-3 py-2 rounded mx-2  transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-md bg-brand-purple hover:bg-brand-purple-darker"
                            as="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            Add New
                    </Link>
                  </div>


                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3 flex justify-center ">
                        <div class="inline-block overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="w-full whitespace-no-wrap">
                            <thead>
                            <tr class="text-xs font-semibold TableRowacking-wide text-left text-gray-800 uppercase bg-gray-50 border-b">
                                <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-800 uppercase border-b border-gray-200 bg-gray-50">Origin</th>
                                <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-800 uppercase border-b border-gray-200 bg-gray-50">Destination</th>
                                <th class="px-6 py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-800 uppercase border-b border-gray-200 bg-gray-50" colspan="2">Actions</th>


                            </tr>
                            </thead>
                            <tbody class="bg-white py-4" >
                                <tr v-for="busroute in busroutes" :key="busroute.id" class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="px-6 py-4 border-b text-gray-500 border-gray-200 whitespace-nowrap">
                                    <div>
                                        {{ busroute.origin }}
                                    </div>

                                    </td>
                                    <td class="px-6 py-4 border-b text-gray-500 border-gray-200 whitespace-nowrap">
                                        <div>
                                            {{ busroute.destination }}
                                        </div>                                 
                                    </td>
                                    <td class="flex">
                                    <Link title="Edit Bus Route" :href="route('busroutes.edit')" class="flex items-center text-white font-semibold px-3 py-2 m-2 rounded duration-300 ease-in-out transform hover:scale-105 hover:shadow-md bg-brand-green hover:bg-brand-green-darker" :data= "{id: busroute.id}" as="button" >
                                        EDIT <!-- Edit info on button -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                        </svg>

                                   </Link>
                                    <PrimaryButton title="Delete Bus Route"
                                                class="flex items-center text-white font-semibold px-3 py-2 m-2 rounded mx-2 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-md"
                                                @Click="destroy(busroute.id)"
                                            > DELETE <!-- Delete info on button -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                    </PrimaryButton>


                                    </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
