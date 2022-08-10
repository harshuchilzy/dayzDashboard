<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
  <AppLayout title="Campaign">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create campaign</h2>
    </template>
     <div class="container mx-auto py-4">
         <form class="bg-white p-5 rounded-lg border-gray-900">
            <div class="grid grid-cols-3 gap-4">
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Campaign Name *</span>
                    <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    "/>
                </label>
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Provider Name *</span>
                    <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    "/>
                </label>
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Assign To Group</span>
                   <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option>....</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    </div>
                </div>
                </label>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Voice Message Text</span>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </label>
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Pre-recorded Audio Message</span>
                    <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </label>
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Audio File URL</span>
                    <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    "/>
                </label>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Target Expectation</span>
                    <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    "/>
                </label>
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Audio File URL</span>
                    <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    "/>
                </label>
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Target Expectation</span>
                    <input type="text" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                    invalid:border-pink-500 invalid:text-pink-600
                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    "/>
                </label>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <label class="block py-1">
                    <span class="block text-sm font-medium text-slate-700">Description</span>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

                </label>
               
            </div>
            <button class="bg-indigo-500 p-2 text-white rounded-md mt-2">
                Save changes
            </button>

          </form>
     </div>
    
  </AppLayout>
</template>