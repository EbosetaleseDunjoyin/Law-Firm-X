<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';

let props = defineProps({
    client: {
        type: Object,
        required : true,
    },
    profile_image:{
        type: String,
        required :true
    }
})

const form = useForm({
    first_name: props.client.first_name,
    last_name: props.client.last_name,
    email: props.client.email,
    primary_legal_counsel: props.client.primary_legal_counsel,
    date_of_birth: props.client.date_of_birth,
    date_of_profiling: props.client.date_of_profiling,
    profile_image: props.profile_image,
    case_details: props.client.case_details,
});




</script>

<template>
    <div class="">

        <Head title="Update Client | Law Firm X" />

        <GuestLayout>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg p-5">
                        <div class="flex lg:justify-start mb-5">
                                <Link href="/client/list" class="py-2 px-6 bg-indigo-500 hover:bg-indigo-800 text-white rounded-lg" >Back</Link>
                            </div>
                        
                        <h1 class="text-3xl text-center font-semibold">Client: {{ form.first_name }}&nbsp; {{ form.last_name }}</h1>
    
                        <div class=" lg:w-7/12 mx-auto my-5 ">
                                <div class="flex justify-center">
                                    <img :src="form.profile_image" class="h-auto w-28 my-5" alt="">
                                </div>
                            
                                <div class="grid md:grid-cols-2 grid-cols-1 gap-8 mb-5">

                                    <div class="form-input-data">
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                        <input type="text" id="first_name" v-model="form.first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jack" required readonly>
                                        
                                    </div>
                                    <div class="form-input-data">
                                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                        <input type="text" id="last_name" v-model="form.last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required readonly>
                                        
                                    </div>
                                    <div class="form-input-data">
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="text" id="email" v-model="form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ebose@gmail.com" required readonly>
                                        
                                    </div>
                                    <div class="form-input-data">
                                        <label for="primary_legal_counsel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primary Legal Counsel</label>
                                        <input type="text" id="primary_legal_counsel" v-model="form.primary_legal_counsel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Barr. Chukwu" required readonly>
                                        
                                    </div>
                                    <div class="form-input-data">
                                        <label for="date_of_profiling" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Profiling</label>
                                        <input type="date" id="date_of_profiling" v-model="form.date_of_profiling" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date of Profiling" required readonly>
                                       
                                    </div>
                                    <div class="form-input-data">
                                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                                        <input type="date" id="date_of_birth" v-model="form.date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date of Birth" required readonly>
                                        
                                    </div>
                                </div>
                                
                                <div class="mb-5">
                                     <label for="case_details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Case Details</label>
                                     <textarea name="case_details" id="" cols="30" rows="10"  v-model="form.case_details" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Case Details" required readonly>

                                     </textarea>
                                        
                                        
                                </div>
                                        
                               
                           
                        </div>
    
    
                    </div>
                </div>
            </div>
    </GuestLayout>
    </div>
</template>
