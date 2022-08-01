<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

import AppLayout from "@/Layouts/AppLayout.vue";
import Table from '../../Components/Table.vue'
import { ref } from "@vue/reactivity";

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
    await axios.get(route('users.paginate', { page: page, per_page: per_page, q: search_query })).then(({ data }) => {
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
                    <div>
                        <Link href="/">Action</Link>
                    </div>
                </template>
            </Table>
        </div>
    </AppLayout>
</template>

