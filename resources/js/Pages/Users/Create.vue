<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

const props = defineProps({
    permissions: Object,
    roles: Object
});

const form = useForm({
    name: "",
    email: "",
    password: "",
    role: ""
});

const submit = () => {
    form.post(route("users.store"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>
<template>
    <AppLayout title="Create user">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a user
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <form @submit.prevent="submit">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium text-gray-900">
                                Profile Information
                            </h3>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="mb-4">
                                    <JetLabel for="name" value="Name" />
                                    <JetInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                                </div>
                                <div class="my-4">
                                    <JetLabel for="email" value="Email" />
                                    <JetInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required />
                                </div>
                                <div class="mt-4" v-if="$page.props.system.autogen_passwords">
                                    <JetLabel for="password" value="Password" />
                                    <JetInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                                </div>

                                <div class="mt-6" v-if="roles">
                                    <h1 class="text-xl mb-2">Role</h1>
                                    <div v-for="(role, id) in roles" :key="id" class="mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input form-checkbox h-6 w-6 appearance-none rounded-full border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" v-model="form.role" :value="role" :id="'role_' + id">
                                            <label class="form-check-label inline-block text-gray-800" :for="'role_' + id">
                                                {{ role }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Register
                        </JetButton>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

