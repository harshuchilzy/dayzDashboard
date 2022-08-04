<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { defineAsyncComponent } from 'vue'

import AppLayout from "@/Layouts/AppLayout.vue";
import Table from '../../Components/Table.vue'
import { ref } from "@vue/reactivity";
import { Inertia } from "@inertiajs/inertia";
import modalDialog from '../../Components/PopupDialog.vue'

// const modalDialog = defineAsyncComponent(() =>
//   import('../../Components/PopupDialog.vue')
// )

const users = ref({});
const pagination = ref({});

const columns = [
    { key: "id", title: "#" },
    { key: "name", title: "Name" },
    { key: "email", title: "Email" },
    { key: "action", title: "" },
];
paginate_users(1);
async function paginate_users(page = 1, per_page = 15, search_query = null) {
    await axios.get(route('users.index', { page: page, per_page: per_page, q: search_query })).then(({ data }) => {
        users.value = data['data'];
        pagination.value = {
            path: data['path'],
            first_page_url: data['first_page_url'],
            last_page_url: data['last_page_url'],
            current_page: data['current_page'],
            last_page: data['last_page'],
            from: data['from'],
            to: data['to'],
            total: data['total']
        }
    }).catch(({ response }) => {
        console.error(response)
    });
}
let showDialog = ref(false);
let itemId = ref(null);
function deleteUser(id) {
    itemId.value = id;
    showDialog.value = true
}

function _confirm(id){
    Inertia.delete(route('users.destroy', itemId.value));

    showDialog.value = false;

}
function _cancel(){
    showDialog.value = false;
}
</script>
<template>
    <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <Table :data="users" :columns="columns" :pagination="pagination" @paginate="fetch_currencies" :search="true">
                <template #cell-id="{ row }">
                    {{ row.id }}
                </template>
                <template #cell-name="{ row }">
                    {{ row.name }}
                </template>
                <template #cell-email="{ row }">
                    {{ row.email }}
                </template>

                <template #cell-action="{ row }">
                    <div class="flex gap-2">
                        <Link :href="route('users.edit', row.id)">Edit</Link>
                        <button @click="deleteUser(row.id)">Delete</button>
                    </div>
                </template>
            </Table>

            <modalDialog v-if="showDialog" :itemId="itemId" @confirm="_confirm" @cancel="_cancel"/>
        </div>
    </AppLayout>
</template>

