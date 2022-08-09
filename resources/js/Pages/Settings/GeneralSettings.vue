<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { Dropdown, ListGroup, ListGroupItem, Tabs, Tab } from 'flowbite-vue'
import { ref } from '@vue/reactivity';
import { Inertia } from '@inertiajs/inertia';
import route from '../../../../vendor/tightenco/ziggy/src/js';
const props = defineProps({
    timezones: Array,
    settings: Array
})
const form = ref({
    settingType: 'general',
    timezone: 'Europe/Amsterdam',
    fallback_number : props.settings.fallback_number
});
function submit(){
    Inertia.post(route('settings.update'), form.value);
}
</script>

<template>
    <AppLayout title="Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="p-12">

                        <form @submit.prevent="submit">
                            <div>
                                <!-- General Settings -->
                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                    General Settings
                                </h6>

                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                        Fallback Phone number
                                    </label>
                                    <input type="text" v-model="form.fallback_number" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>

                                <div class="relative w-full mb-3 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                        Timezone
                                    </label>
                                    <dropdown text="Timezones" placement="bottom" v-model="form.timezone">
                                        <list-group>
                                            <list-group-item v-for="(timezone, i) in timezones" :key="i">{{ timezone.timezone }}</list-group-item>
                                        </list-group>
                                    </dropdown>
                                </div>
                                <!-- End - General Settings -->

                                <!-- Submit -->
                                <div class="flex gap-5">
                                    <div class="w-3/12"></div>
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-12 py-2 rounded-lg">Submit</button>
                                </div>
                                <!-- End - Submit -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>