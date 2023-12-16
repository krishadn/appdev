<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Carousel from '@/Components/Carousel.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import BarChart from '@/Components/BarChart.vue';
import DoughChart from '@/Components/DoughChart.vue';

const props = defineProps({
    bus_types: Object,
    bus_status: Object,
    schedules: Object,
    sched_buses: Number,
    unsched_buses: Number,
})

const typeLabels = props.bus_types.map(obj => obj.type)
const typeData = props.bus_types.map(obj => obj.bus_count)

const typeDatasets = [{
        label: 'Bus by Type',
        data: typeData,
        backgroundColor:['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)','rgb(255, 205, 86)'],
        borderWidth: 1
}]

const statusLabels = props.bus_status.map(obj => obj.status)
const statusData = props.bus_status.map(obj => obj.bus_count)

const statusDatasets = [{
        label: 'Bus by Status',
        data: statusData,
        backgroundColor:['#8952B0','#89D036'],
        borderWidth: 1
}]

const availLabels = ['Available', 'Scheduled']
const availDatasets = [{
    label: 'Bus by Availability',
    data: [props.unsched_buses, props.sched_buses],
    backgroundColor:['#8952B0','#89D036'],
    borderWidth: 1
}] 

onMounted(() => {
    
})

function destroy(id){
    if (confirm('Are you sure you want to delete this Schedule ?',id)) {
       router.delete(route("schedule.destroy",id));
       alert("Schedule deleted");
    }
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>


<div class="flex justify-center">
  <div class="p-6 my-4 x-">
    <div class="grid grid-cols-3 md:grid-cols-2 gap-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <DoughChart :labels="typeLabels" :datasets="typeDatasets" />
        <BarChart :labels="availLabels" :datasets="availDatasets" />
      </div>
      <div class="grid grid-cols-1 md:grid-cols-1 gap-">
        <BarChart :labels="statusLabels" :datasets="statusDatasets" />
        
      </div>

    </div>

  </div>

</div>

           


            <!-- Schedule Today Section -->
            <div class="bg-white overflow-hidden  shadow-sm sm:rounded-lg p-3">
                <h1 class="text-xl font-semibold">SCHEDULE TODAY</h1>

                <!-- Schedule Table -->
                <div class="inline-block w-full overflow-x-auto align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    <table class="w-full whitespace-no-wrap">
                        <thead>
              <tr class="text-xs font-semibold TableRowacking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                >
                Departure Time
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                >
                Arrival Time
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                >
                Origin
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                >
                Destination
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                >
                Status
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                >
                Bus Type
                </th>
                <th
                  class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                >
                Action
                </th>
              </tr>
            </thead>
                        <tbody class="bg-white divide-y">
                            <tr v-for="schedule in schedules" :key="schedule.id" 
                            :class="{
                                'border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-500 dark:hover:bg-neutral-600': true,
                                
                                'bg-green-300': schedule.status === 'In Transit',
                                'bg-blue-300': schedule.status === 'Arrived',
                                'bg-red-300': schedule.status === 'Delay',
                                'bg-yellow-300': schedule.status === 'Waiting',
                            }">
                <td
                  class="px-6  py-4 border-b border-gray-200 whitespace-nowrap"
                >
                  <div class="text-sm leading-5 text-gray-900">
                    {{ schedule.departure_time }}
                  </div>
                  <!-- <div class="text-sm leading-5 text-gray-500">
                    {{ u.title2 }}
                  </div> -->
                </td>

                <td
                  class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                  <div class="text-sm leading-5 text-gray-900">
                    {{ schedule.arrival_time }}
                  </div>
                  <!-- <div class="text-sm leading-5 text-gray-500">
                    {{ u.title2 }}
                  </div> -->
                </td>

                <td
                  class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                  <div class="text-sm leading-5 text-gray-900">
                    {{ schedule.origin }}
                  </div>
                  <!-- <div class="text-sm leading-5 text-gray-500">
                    {{ u.title2 }}
                  </div> -->
                </td>
 
                <td
                  class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                  <div class="text-sm leading-5 text-gray-900">
                    {{ schedule.destination }}
                  </div>
                  <!-- <div class="text-sm leading-5 text-gray-500">
                    {{ u.title2 }}
                  </div> -->
                </td>

                <td
                  class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                  <div class="text-sm leading-5 text-gray-900">
                    {{ schedule.status }}
                  </div>
                  <!-- <div class="text-sm leading-5 text-gray-500">
                    {{ u.title2 }}
                  </div> -->
                </td>

                <td
                  class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                >
                  <div class="text-sm leading-5 text-gray-900">
                    {{ schedule.type }}
                  </div>
                  <!-- <div class="text-sm leading-5 text-gray-500">
                    {{ u.title2 }}
                  </div> -->
                </td>


                                <td class="flex">
                                    <Link :href="route('schedule.edit')" class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold px-3 py-2  m-2 rounded mx-2"
                                            :data= "{id: schedule.id}" as="button" >
                                            EDIT <!-- Edit info on button -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                           </svg>
                                        </Link>
                                        <PrimaryButton title="Delete Schedule" class="flex items-center bg-red-500 hover:bg-red-700 text-white font-semibold px-3 py-2 m-2 rounded mx-2"
                                                @Click="destroy(schedule.id)"
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
    </AuthenticatedLayout>
</template>
