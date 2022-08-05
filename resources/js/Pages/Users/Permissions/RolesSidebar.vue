<script setup>
import { Link } from "@inertiajs/inertia-vue3";
const props = defineProps({
    roles: Object,
    role: Object
})
</script>

<template>
    <div class="md:col-span-1">
        <h3 class="text-lg font-medium text-gray-900">
            Edit Roles
        </h3>

        <div class="mt-5">
            <div v-for="role in roles" :key="role.id" class="mb-2">
                <Link class="text-left border border-gray-300 text-sm py-1 px-3 rounded-md bg-white shadow" :href="route('roles.edit', role.id)">{{ role.name }}</Link>
            </div>
            <div class="mb-2" v-if="role">
                <Link :href="route('roles.create')" class="text-left border border-gray-300 text-sm py-1 px-3 rounded-md bg-white shadow" type="button">
                    Add new role
                </Link>
            </div>
            <div class="mb-2" v-else-if="!roles">
                No roles available yet.
            </div>
        </div>
    </div>
</template>