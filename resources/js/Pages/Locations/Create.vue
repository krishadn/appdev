<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,router  } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { reactive,ref } from 'vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'

const props = defineProps({
        locations: Object
    })



  const form=reactive({
      location: "",
  })

  function submit() {
    let loc_exist = false;

    props.locations.forEach(loc => {
        if (loc.location.toLowerCase() === form.location.toLowerCase()){
            loc_exist = true;
        }
    })

    if(loc_exist){
        alert('Location already exist');
        return;
    }

    router.post(route("location.store"),form);
    alert("Location successfully updated");
  }



</script>

<template>
    <Head title="Create Location" />

    <AuthenticatedLayout>


        <div class="py-12">
            <div class="p-3 flex justify-center mb-5">
                        <h1 class="text-4xl font-bold">Add New Location</h1>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
   
                <div class="overflow-hidden w-1/2 bg-brand-cream bg-opacity-30 rounded-lg border shadow-xs">

                    <div class="flex justify-center m-6">
                            <form class=""  @submit.prevent="submit">
                                <div class="">
                                <InputLabel for="location" class="" value="Location"/>
                                </div>
                                <div class="">
                                    <TextInput  id="location"  type="text" v-model="form.location" required />
                                </div>

                                <div class="py-3 flex justify-center mt-4">
                                    <PrimaryButton type="submit"> Submit  </PrimaryButton>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
