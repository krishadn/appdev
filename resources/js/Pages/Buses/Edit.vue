<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { reactive,ref } from 'vue'

const props = defineProps({
      bus: Object,
      buses: Object
  })
//   function submit(busroute) {
//       router.put(route("busroutes.update"),busroute);
//   }

const regex = /^[A-Z]{3}[0-9]{3}$/;

  const form= reactive({
            _method: 'put',
            capacity: props.bus.capacity,
            code: props.bus.code,
            type: props.bus.type,
            status: props.bus.status,

    })

    function update() {
        if (!regex.test(form.code)){
        alert("Invalid code (format: ABC123)")
        return;
        }

        let code_exist = false;

        props.buses.forEach(bus => {
            if (bus.code === form.code && bus.code !== props.bus.code){
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

        router.post(`/bus/${props.bus.id}`, {
            _method: 'put',
            capacity: form.capacity,
            code: form.code,
            type: form.type
        })
        alert("Bus successfully updated");
  }

</script>



<template>
    <Head title="Update Bus" />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="p-3 flex justify-center mb-5">
                        <h1 class="text-4xl font-bold">Update Bus</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
   
                 <div class="overflow-hidden w-1/2 bg-brand-cream bg-opacity-30 rounded-lg border shadow-xs">

                    <div class="overflow-x-auto mx-8 py-5">
                            <form @submit.prevent="update" >
                                <InputLabel for="code" value="Code"/>
                                <TextInput
                                    id="code"
                                    type="text"
                                    v-model="form.code"
                                    required
                                />
                                <InputLabel for="type" class="">Bus Type</InputLabel>
                                <select id="type" v-model="form.type" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option value="De Luxe">De Luxe</option>
                                    <option value="Standard Bus">Standard Bus</option>
                                    <option value="Luxury">Luxury</option>
                                    <option value="Super De Luxe">Super De Luxe</option>
                                 </select>
                                 
                                <InputLabel for="capacity"  value="Capacity"/>
                                <TextInput
                                    id="capacity"
                                    type="number"
                                    min = 1
                                    max = 85
                                    v-model="form.capacity"

                                    required
                                />

                                <InputLabel for="type" class="">Status</InputLabel>
                                <select id="type" v-model="form.status" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option value="Good Condition">Good Condition</option>
                                    <option value="For Repair">For Repair</option>
                                 </select>
                                <div class="py-3 flex justify-center mt-4">
                                   <PrimaryButton>Submit</PrimaryButton>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
