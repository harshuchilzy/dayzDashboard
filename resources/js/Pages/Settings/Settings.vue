<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { Dropdown, ListGroup, ListGroupItem, Tabs, Tab } from 'flowbite-vue'
import { ref } from '@vue/reactivity';

const props = defineProps({
    timezones: Array
})

</script>

<template>
    <AppLayout title="Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="p-3">

                        <div>
                            <!-- General Settings -->
                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                General Settings
                            </h6>

                            <div class="relative w-full mb-3 flex items-center gap-5">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12" htmlfor="grid-password">
                                    Timezone
                                </label>
                                <dropdown text="Timezones" placement="bottom">
                                    <list-group>
                                        <list-group-item v-for="(timezone, i) in timezones" :key="i">{{ timezone.timezone }}</list-group-item>
                                    </list-group>
                                </dropdown>
                            </div>
                            <div class="border-b-2 border-slate-200 my-6"></div>
                            <!-- End - General Settings -->

                            <!-- Providers -->
                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Provider Settings
                            </h6>
                            <div class="relative w-full mb-5 flex items-center gap-5">
                                <span class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                    Provider
                                </span>

                                <div class="grid grid-cols-1">
                                    <label for="twilio" class="uppercase text-blueGray-600 text-xs font-bold w-full mb-3">
                                        <input id="twilio" type="radio" name="provider" class=" indeterminate:bg-gray-300 mr-3" />
                                        Twilio
                                    </label>

                                    <label for="signalwire" class="uppercase text-blueGray-600 text-xs font-bold w-full">
                                        <input id="signalwire" type="radio" name="provider" class=" indeterminate:bg-gray-300 mr-3" />
                                        Signalwire
                                    </label>
                                </div>

                            </div>

                            <div>
                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                        Account SID
                                    </label>
                                    <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>

                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                        Account Token
                                    </label>
                                    <input type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>

                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                        Service SID
                                    </label>
                                    <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>

                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                        API Key
                                    </label>
                                    <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>

                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                        API Secret
                                    </label>
                                    <input type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>
                            </div>

                            <div>
                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                        Space URL
                                    </label>
                                    <input type="url" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>

                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                        Project ID
                                    </label>
                                    <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>

                                <div class="relative w-full mb-5 flex items-center gap-5">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold w-1/12">
                                        Project Token
                                    </label>
                                    <input type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                </div>
                            </div>
                            <!-- End - Providers -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>