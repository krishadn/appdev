<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { reactive,ref } from 'vue'

import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
      busroute: Object,
      locations: Object,
  })



  const form= reactive({
            _method: 'put',
            origin: props.busroute.origin,
            destination: props.busroute.destination,
    })

    function update() {
        if(form.origin === form.destination){
        alert("Origin and Destination cannot be the same");
        return;
        }   

        if(!form.origin || !form.destination){
            alert("All fields are required");
            return;
        }
        

        router.post(`/busroute/${props.busroute.id}`, {
            _method: 'put',
            origin: form.origin,
            destination: form.destination,
        })
        console.log(props.busroute.id);
  }

</script>



<template>
    <Head title="Update Bus Route" />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="p-3 flex justify-center mb-5">
                        <h1 class="text-4xl font-bold">Update Route</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
   
                <div class="overflow-hidden w-1/2 bg-brand-cream bg-opacity-30 rounded-lg border shadow-xs">

                    <div class="overflow-x-auto  m-8 ">
                            <form @submit.prevent="update" >
                                <div class="mb-4">
                                    <InputLabel for="origin" class="block font-medium text-gray-700">
                                        Select Origin:
                                    </InputLabel>
                                    <select id="route" v-model="form.origin" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                        <option v-for="location in locations"  :value="location.location">
                                            {{ location.location }} </option>
                                   </select>
                                </div>
                                <div class="mb-4">
                                    <InputLabel for="origin" class="block font-medium text-gray-700">
                                        Select Destination:
                                    </InputLabel>
                                    <select id="route" v-model="form.destination" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                        <template v-for="location in locations">
                                            <option v-if="location.location != form.origin" :value="location.location">
                                            {{ location.location }}</option>
                                        </template>
                                   </select>
                                </div>
                                <div class="py-3 flex justify-center mt-4">
                                    <PrimaryButton>Update Route</PrimaryButton>
                                </div>
                                
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
