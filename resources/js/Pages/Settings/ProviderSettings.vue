<script setup>
import AppLayout from '../../Layouts/AppLayout.vue';
import { Dropdown, ListGroup, ListGroupItem, Tabs, Tab } from 'flowbite-vue'
import { ref } from '@vue/reactivity';
import { Inertia } from '@inertiajs/inertia';
import route from '../../../../vendor/tightenco/ziggy/src/js';

const props = defineProps({
    settings: Array
})

let form = ref({
    settingType: 'providers',
    accountSid: '',
    accountToken: '',
    serviceSID: '',
    account_apiKey: '',
    account_apiSecret: '',
    spaceUrl: '',
    projectId: '',
    projectToken: ''
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
                                <!-- Providers -->
                                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                    Provider Settings
                                </h6>
                                <!-- <div class="relative w-full mb-5 flex items-center gap-5">
                                    <span class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                        Provider
                                    </span>

                                    <div class="grid grid-cols-1">
                                        <label for="twilio" class="uppercase text-blueGray-600 text-xs font-bold w-full mb-3">
                                            <input id="twilio" type="radio" v-model="form.provider_type" value="twilio" name="provider" class=" indeterminate:bg-gray-300 mr-3" />
                                            Twilio
                                        </label>

                                        <label for="signalwire" class="uppercase text-blueGray-600 text-xs font-bold w-full">
                                            <input id="signalwire" type="radio" v-model="form.provider_type" value="signalwire" name="provider" class=" indeterminate:bg-gray-300 mr-3" />
                                            Signalwire
                                        </label>
                                    </div>

                                </div> -->

                                <div>
                                    <h6 class="text-blueGray-400 text-lg mb-6 font-bold uppercase">
                                        Twilio
                                    </h6>
                                    <div class="relative w-full mb-5 flex items-center gap-5">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                            Account SID
                                        </label>
                                        <input type="text" v-model="form.accountSid" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                    </div>

                                    <div class="relative w-full mb-5 flex items-center gap-5">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                            Account Token
                                        </label>
                                        <input type="password" v-model="form.accountToken" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                    </div>

                                    <div class="relative w-full mb-5 flex items-center gap-5">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                            Service SID
                                        </label>
                                        <input type="text" v-model="form.serviceSID" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                    </div>

                                    <div class="relative w-full mb-5 flex items-center gap-5">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                            API Key
                                        </label>
                                        <input type="text" v-model="form.account_apiKey" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                    </div>

                                    <div class="relative w-full mb-5 flex items-center gap-5">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                            API Secret
                                        </label>
                                        <input type="password" v-model="form.account_apiSecret" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                    </div>
                                </div>

                                <div class="mt-14 block">
                                    <h6 class="text-blueGray-400 text-lg mb-6 font-bold uppercase">
                                        Signalwire
                                    </h6>
                                    <div class="relative w-full mb-5 flex items-center gap-5">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                            Space URL
                                        </label>
                                        <input type="url" v-model="form.spaceUrl" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                    </div>

                                    <div class="relative w-full mb-5 flex items-center gap-5">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                            Project ID
                                        </label>
                                        <input type="text" v-model="form.projectId" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                    </div>

                                    <div class="relative w-full mb-5 flex items-center gap-5">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold w-3/12">
                                            Project Token
                                        </label>
                                        <input type="password" v-model="form.projectToken" class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-1/2 ease-linear transition-all duration-150" />
                                    </div>
                                </div>
                                <!-- End - Providers -->

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