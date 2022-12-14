<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia'
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import { ref } from "@vue/reactivity";
import axios from "axios";
import Sidebar from "./RolesSidebar.vue"

const props = defineProps({
    permissions: Object,
    roles: Object,
    role: Object
});
// var role = ref(props.role)

var form = useForm({
    role_title: props.role.name,
    permission_title: "",
    role_permissions: props.role.permissions
});

function addPermission() {
    Inertia.post(route('permissions.store'), form);
};

var showPermissionForm = ref(false);

function showPermissionCreate() {
    showPermissionForm.value = true;
}

const submit = () => {
    form.patch(route("roles.update", props.role.id), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};

function deleteRole(){
    Inertia.delete(route('roles.destroy', props.role.id));
}
</script>

<template>
    <AppLayout title="Add Permissions & Roles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permissions & Roles
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <form @submit.prevent="submit">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <Sidebar :roles="roles" :role="role"/>

                        <div class="mt-5 md:mt-0 md:col-span-2">

                            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                                <div class="mb-4">
                                    <JetLabel for="role_title" value="Role title" />
                                    <JetInput id="role_title" v-model="form.role_title" type="text" class="mt-1 block w-full" required autofocus autocomplete="role_title" />
                                </div>

                                <div>
                                    <div class="mt-10 mb-4">
                                        <h1 class="text-lg font-bold">Permissions</h1>
                                    </div>
                                    <div class="grid grid-cols-3">
                                        <div v-for="permission in permissions" :key="permission.id" class="mb-4">
                                            <label :for="'toggle-' + permission.id" class="flex items-start cursor-pointer">
                                                <div class="relative">
                                                    <input type="checkbox" :id="'toggle-' + permission.id" v-model="form.role_permissions" :value="permission.id" class="sr-only">
                                                    <div class="block bg-gray-400 w-9 h-5 rounded-full"></div>
                                                    <div class="dot absolute left-1 top-1 bg-white w-3 h-3 rounded-full transition"></div>
                                                </div>
                                                <div class="ml-2 text-gray-700 font-medium">
                                                    {{ permission.name }}
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4" v-if="showPermissionForm">
                                    <div class="flex items-end gap-4">
                                        <div class="w-4/5">
                                            <JetLabel for="permission_title" value="Permissions" />
                                            <JetInput id="permission_title" v-model="form.permission_title" type="text" class="mt-1 block w-full" required autofocus autocomplete="permission_title" />
                                        </div>
                                        <div>
                                            <button @click="addPermission" type="button" class="bg-blue-400 text-white text-sm rounded-md py-3 px-4 h-full">Add Permission</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 flex gap-2">
                                    <button type="submit" class="px-2 py-1 bg-blue-400 rounded-lg text-sm text-white">Update role</button>
                                    <button type="button" @click="showPermissionCreate" class="px-2 py-1 bg-gray-200 rounded-lg text-sm text-black">Create Permission</button>
                                    <button type="button" v-show="role" @click="deleteRole()" class="px-2 py-1 bg-red-400 rounded-lg text-sm text-white">Delete role</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>