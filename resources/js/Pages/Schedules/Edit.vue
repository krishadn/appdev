<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import { reactive,ref } from 'vue'

const props = defineProps({
    busSchedule: Object,
    routes: Object,
    buses: Object

  })

  const form= reactive({
            arrival_time: props.busSchedule.arrival_time,
            departure_time: props.busSchedule.departure_time,
            price: props.busSchedule.price,
            bus_id: props.busSchedule.bus_id,
            route_id:props.busSchedule.route_id,
            status: props.busSchedule.status
    })

    const min_date = new Date();

    function update() {
        if (form.departure_time < min_date){
        alert("Invalid departure time date");
        return;
        }

        if (form.departure_time >= form.arrival_time){
            alert("Invalid arrival time date");
            return;
        }

        if (!form.departure_time || !form.arrival_time || !form.price 
            || !form.bus_id || !form.route_id || !form.status){
            alert("All fields are required")
            return;
        }

        router.post(`/schedule/${props.busSchedule.id}`, {
            _method: 'put',
            arrival_time: form.arrival_time,
            departure_time: form.departure_time,
            price: form.price,
            bus_id:  form.bus_id,
            route_id: form.route_id,
            status: form.status
        })
        alert("Schedule updated");
  }

</script>



<template>
    <Head title="Update Bus Schedule" />

    <AuthenticatedLayout>
        

        <div class="py-12">
            <div class="p-3 flex justify-center mb-5">
                        <h1 class="text-4xl font-bold">Update Schedule</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
   
                <div class="overflow-hidden w-1/2 bg-brand-cream bg-opacity-30 rounded-lg border shadow-xs">

       
                    <div class="overflow-x-auto  mx-8 ">
                            <form @submit.prevent="update" >
                                <div class="md:w-1/3">
                                <InputLabel for="departure_time" class="" value="Departure Time"/>
                                </div>
                                <div class="block w-full">

                                    <TextInput  id="departure_time" type="datetime-local" v-model="form.departure_time" required />
                                </div>
                                <div>
                                    <InputLabel for="arrival_time"  value="Arrival Time"/>
                                </div>
                                <div class="block w-full">
                                    <TextInput  id="arrival_time"  type="datetime-local" v-model="form.arrival_time" required />
                                </div>
                                <div>
                                    <InputLabel for="price"  value="Price"/>
                                </div>
                                <div class="block w-full">
                                    <TextInput  id="price"  type="number" v-model="form.price" min = 1 required />
                                </div>

                                <InputLabel for="route" class="">Bus Route</InputLabel>
                                <select id="route" v-model="form.route_id" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option v-for="route in routes"  :value="route.id">{{ route.origin }} - {{ route.destination }}</option>
                                 </select>

                                 <InputLabel for="bus" class="">Bus </InputLabel>
                                <select id="route" v-model="form.bus_id" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option v-for="bus in buses"  :value="bus.id">{{ bus.code }} - {{ bus.type }}</option>
                                 </select>

                                 <InputLabel for="type" class="">Status</InputLabel>
                                <select id="type" v-model="form.status" class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none focus:border-indigo-500">
                                    <option value="In Transit">In Transit</option>
                                    <option value="Arrived">Arrived</option>
                                    <option value="Delay">Delay</option>
                                    <option value="Waiting">Waiting</option>
                                 </select>

                                 <div class="py-3 flex justify-center mt-4 mb-4">
                                <PrimaryButton type="submit"> Update Schedule  </PrimaryButton>
                                </div>

                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
