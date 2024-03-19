<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

import GuestLayout from '@/Layouts/GuestLayout.vue';
import { reactive } from 'vue';

defineProps({
    clients: {
        type: Object,
        required: true
    }
});

let filters = reactive({
    last_name:""
});

const applyFilters = () => {
    router.get(`/client/list?lastName=${filters.last_name}`)
}
</script>

<template>
    <div class="">

        <Head title="Clients | Law Firm X" />
    
        <GuestLayout>
           
    
              <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg p-5">
                       
                        <h1 class="text-3xl text-center font-semibold my-5">Clients</h1>
    
                       <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex flex-col gap-2 my-10 max-w-md">
                            <label for="filter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter by Last name</label>
                            <input type="text" id="filter" v-model="filters.last_name" placeholder="Search by last name" @input="applyFilters()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <table v-if="clients.length > 0" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        S/N
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        First Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Last Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Primary Legal Counsel
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date of Birth
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date of Profiling
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Profile Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr v-for="(client, index) in clients" :key="index" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      {{  index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                       {{ client.first_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{ client.last_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{ client.email }}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{ client.primary_legal_counsel }}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{ client.date_of_birth }}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{ client.date_of_profiling }}
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <img :src="client.profile_image" class="h-auto w-24" alt="">
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <div class="flex gap-1 items-center">
                                            <Link :href="`/client/${client.id}`" class="font-medium text-green-600 dark:text-green-500 hover:underline">View</Link>
                                            |
                                            <Link :href="`/client/${client.id}/edit`" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                                            
                                        </div>
                                    </td>
                                </tr>
                            
                            
                            </tbody>
                            </table>
                            <h2 class="text-gray-800 dark:text-white text-xl text-center" v-else >No data found...</h2>
                        </div>
    
    
                    </div>
                </div>
            </div>
    </GuestLayout>
    </div>
</template>
