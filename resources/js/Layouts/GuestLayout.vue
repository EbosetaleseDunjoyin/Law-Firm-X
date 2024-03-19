<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <div class="min-h-screen bg-gray-100 dark:bg-slate-700 dark:text-white py-10">

        <div class="flex justify-center">
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>
         <div class="  p-6 flex flex-wrap gap-8 justify-center my-4">
            <NavLink :href="route('client.list')" :active="route().current('client.list')">
                Clients
            </NavLink>
            <NavLink :href="route('client.create')" :active="route().current('client.create')">
                New Client
            </NavLink>
        </div>

        <div>
            <div class="text-center p-4 bg-red-600 text-white" v-if="$page.props.flash.error">
                {{ $page.props.flash.error }}
            </div>
            <div class="text-center p-4 bg-green-600 text-white" v-if="$page.props.flash.success">
                {{ $page.props.flash.success }}
            </div>
            <slot />
        </div>
    </div>
</template>
