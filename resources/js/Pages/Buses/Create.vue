<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { reactive,ref } from 'vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'

const props = defineProps({
        buses: Object
    })

  const form=reactive({
      code: "",
      capacity: "",
      type: "",
      status:"",
  })

  const regex = /^[A-Z]{3}[0-9]{3}$/;
  function submit() {
    if (!regex.test(form.code)){
        alert("Invalid code (format: ABC123)")
        return;
    }

    let code_exist = false;

    props.buses.forEach(bus => {
        if (bus.code === form.code){
            code_exist = true;
        }
    })

    if(code_exist){
        alert('Code entered already exist');
        return;
    }

    if (!form.code || !form.capacity || !form.type || !form.status){
        alert("All fields are required")
        return;
    }

    router.post(route("bus.store"),form);  
    alert("Bus successfully created");
  }


</script>

<template>
    <Head title="Create Bus " />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="p-3 flex justify-center mb-5">
                        <h1 class="text-4xl font-bold">Add New Bus</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
   
                <div class="overflow-hidden w-1/2 bg-brand-cream bg-opacity-30 rounded-lg border shadow-xs">

                    <div class="flex justify-center m-6">
                            <form class="w-full max-w-sm"  @submit.prevent="submit">
                                <div class="md:w-1/3">
                                <InputLabel for="code" class="" value="Code"/>
                                </div>
                                <div class="block w-full">
                                    <TextInput  id="code"  type="text" v-model="form.code" required/>
                                </div>
                                <InputLabel for="type" class="">Bus Type</InputLabel>
                                <select id="type" v-model="form.type" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option value="De Luxe">De Luxe</option>
                                    <option value="Standard Bus">Standard Bus</option>
                                    <option value="Luxury">Luxury</option>
                                    <option value="Super De Luxe">Super De Luxe</option>
                                 </select>

                                <InputLabel for="capacity"  class="" value="Capacity"/>
                                <TextInput
                                    id="capacity"
                                    type="number"
                                    min="1" 
                                    max="85"
                                    v-model="form.capacity"
                                    required
                                />
                                <InputLabel for="type" class="">Status</InputLabel>
                                <select id="type" v-model="form.status" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option value="Good Condition">Good Condition</option>
                                    <option value="For Repair">For Repair</option>
                                 </select>
                                <div class="py-3 flex justify-center mt-4">
                                <PrimaryButton type="submit"> Add Bus  </PrimaryButton>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
