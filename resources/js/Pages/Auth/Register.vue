<script setup >
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { useForm as useFormHcaptcha } from '@inertiajs/vue3';

import VueHcaptcha from '@hcaptcha/vue3-hcaptcha';



const form = useFormHcaptcha({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

// const submit = () => {
//     form.post(route('register'), {
//         onFinish: () => form.reset('password', 'password_confirmation'),
//     });
// };
// const hCaptcha = async () => {hcaptcha.execute("7d0f0ea1-2454-49cd-9c2c-63fbdd941cf1", { async: true })
//     .then(({ response, key }) => {
//         console.log(response, key);
//     })
//     .catch(err => {
//         console.error(err);
//     });
// }
let isTokenValid = false;


const submit = async () => {
    try {
        console.log("SUBMITTED");
        console.log(isTokenValid);
        const token = hcaptchaExecute();
        if (isTokenValid) {
            form.post(route('register'), {
                onFinish: () => form.reset('password', 'password_confirmation'),
            });
        }
    } catch (error) {
        console.error('hCaptcha execution error:', error);
    }
};

// Function to execute hCaptcha
const hcaptchaExecute = async () => {
    await hcaptcha.execute()
    isTokenValid = true;
      
};


const verifyHcaptchaToken = async (token) => {
  const secretKey = 'ES_5873872438614b92a263ed2fff7905d4'; // Replace with your hCaptcha secret key

  const url = 'https://api.hcaptcha.com/siteverify';
  const body = new URLSearchParams({
    secret: secretKey,
    response: token,
  });

  try {
    const response = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `response=${token}&secret=${secretKey}`,
    });

    if (response.ok) {
      const data = await response.json();
      return data.success; // Returns true if token is verified, otherwise false
    } else {
      throw new Error('Failed to verify hCaptcha token');
    }
  } catch (error) {
    console.error('Error verifying hCaptcha token:', error);
    return false; // Verification failed
  }
};


</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" class="mt-3" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt0 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-3" :message="form.errors.name" />
            </div>

            <div class="mt-3">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt0 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-1" :message="form.errors.email" />
            </div>

            <div class="mt-3">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt0 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-1" :message="form.errors.password" />
            </div>

            <div class="mt-3">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt0 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-1" :message="form.errors.password_confirmation" />
            </div>

            <div lass="flex items-center justify-end mt-3">
                <VueHcaptcha sitekey='7d0f0ea1-2454-49cd-9c2c-63fbdd941cf1'  ref="hcaptcha"/> <!-- Replace with your hCaptcha site key -->

            </div>

            <div class="flex items-center justify-end mt-2">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-599 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-green">
                    Already registered?
                </Link>
                <PrimaryButton class="ml-3 sm:text-s" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
            

        </form>
    </GuestLayout>
</template>