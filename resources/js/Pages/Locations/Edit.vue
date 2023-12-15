<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { reactive,ref } from 'vue'

const props = defineProps({
      location: Object,
      locations: Object
  })


  const form= reactive({
            _method: 'put',
            location: props.location.location,


    })

    function update() {
        let loc_exist = false;

        props.locations.forEach(loc => {
            if (loc.location.toLowerCase() === form.location.toLowerCase() && 
            loc.location.toLowerCase() !== props.location.location.toLowerCase()){
                loc_exist = true;
            }
        })

        if(loc_exist){
            alert('Location already exist');
            return;
        }

        router.post(`/location/${props.location.id}`, {
            _method: 'put',
            location: form.location,

        })
        alert("Location updated");
  }

</script>



<template>
    <Head title="Update Location " />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="p-3 flex justify-center mb-5">
                        <h1 class="text-4xl font-bold">Update Location</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
   
                <div class="overflow-hidden w-1/2 bg-brand-cream bg-opacity-30 rounded-lg border shadow-xs">

                    <div class="flex justify-center m-6">
                            <form @submit.prevent="update" >
                                <InputLabel for="location" value="location"/>
                                <TextInput
                                    id="code"
                                    type="text"
                                    v-model="form.location"
                                    required
                                />
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
