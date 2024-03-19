<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import GuestLayoutVue from '@/Layouts/GuestLayout.vue';
</script>

<template>
    <div class="">

        <Head title="Law Firm X" />
    
        <GuestLayoutVue>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            </template>
    
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col justify-center p-6">

                       
                        <a href="/client/list" class="underline">Clients</a>
                    </div>
                </div>
            </div>
        </GuestLayoutVue>
    </div>
</template>
