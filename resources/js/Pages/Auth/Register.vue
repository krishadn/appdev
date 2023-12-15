<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import VueHcaptcha from '@hcaptcha/vue3-hcaptcha';


const form = useForm({
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


const submit = async () => {
    try {
        const token = await hcaptchaExecute(); // Execute hCaptcha and get the response token
        form.captcha = token; // Assign the token to the form field

        // Post the form data including the captcha token
        form.post(route('register'), {
            onFinish: () => {
                form.reset('password', 'password_confirmation');
                form.captcha = null; // Reset the captcha field after successful submission
            },
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            data: {
                ...form.data(),
                captcha: form.captcha, // Include the captcha token in the form data
            },
        });
    } catch (error) {
        console.error('hCaptcha execution error:', error);
    }
};

// Function to execute hCaptcha
const hcaptchaExecute = async () => {
    return new Promise((resolve, reject) => {
        if (typeof window !== 'undefined' && window.hcaptcha) {
            window.hcaptcha.execute({ async: true }).then((token) => {
                resolve(token);
            }).catch((error) => {
                reject(error);
            });
        } else {
            reject('hCaptcha is not loaded');
        }
    });
};

</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="hcaptchaExecute">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt0 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-1" :message="form.errors.name" />
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

            <div class="flex items-center justify-start mt-3">
                <VueHcaptcha sitekey='7d0f0ea1-2454-49cd-9c2c-63fbdd941cf1'/> <!-- Replace with your hCaptcha site key -->

            </div>

            <div class="flex items-center justify-end mt-3">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-599 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>
                <PrimaryButton class="ml-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
            

        </form>
    </GuestLayout>
</template>
