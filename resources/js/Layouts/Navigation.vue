<script setup>
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import JetNavLink from '@/Jetstream/NavLink.vue';
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue';
</script>
<template>
    <div>
        <JetDropdown align="right" width="48">
            <template #trigger>
                <span class="inline-flex rounded-md">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                    Users management
                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                </span>
            </template>

            <template #content>
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    Manage users
                </div>

                <JetDropdownLink :href="route('users.index')">
                    All Users
                </JetDropdownLink>

                <JetDropdownLink :href="route('users.create')">
                    New user
                </JetDropdownLink>

                <JetDropdownLink :href="route('permissions.create')">
                    Roles
                </JetDropdownLink>
            </template>
        </JetDropdown>
    </div>
</template>