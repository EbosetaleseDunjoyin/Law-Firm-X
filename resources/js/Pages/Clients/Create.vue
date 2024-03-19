<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';


const form = useForm({
    first_name: null,
    last_name: null,
    email: null,
    primary_legal_counsel: null,
    date_of_birth: null,
    date_of_profiling: null,
    profile_image: null,
    case_details: null,
})

function submit(){
    form.post("/client/store",{
        onSuccess: () => form.reset(
            'first_name',
            'last_name',
            'email',
            'primary_legal_counsel',
            'date_of_birth',
            'date_of_profiling',
            'profile_image',
            'case_details'
        ),
    })
}
onMounted(() => {
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("date_of_birth").max = today;
    document.getElementById("date_of_profiling").max = today;
})
</script>

<template>
    <div class="">

        <Head title="Create Client | Law Firm X" />
    
        <GuestLayout>
           
    
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg p-5">
                        <div class="flex lg:justify-start mb-5">
                                <Link href="/client/list" class="py-2 px-6 bg-indigo-500 hover:bg-indigo-800 text-white rounded-lg" >Back</Link>
                            </div>
                        <h1 class="text-3xl text-center font-semibold">New Client</h1>
    
                        <div class=" lg:w-7/12 mx-auto my-5 ">
    
                            <form class="" @submit.prevent="submit()">
                                <div class="grid md:grid-cols-2 grid-cols-1 gap-8 mb-5">

                                    <div class="form-input-data">
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                        <input type="text" id="first_name" v-model="form.first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jack" required>
                                        <p class="text-red-500">{{ form.errors.first_name }}</p>
                                    </div>
                                    <div class="form-input-data">
                                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                        <input type="text" id="last_name" v-model="form.last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                                        <p class="text-red-500">{{ form.errors.last_name }}</p>
                                    </div>
                                    <div class="form-input-data">
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="text" id="email" v-model="form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ebose@gmail.com" required>
                                        <p class="text-red-500">{{ form.errors.email }}</p>
                                    </div>
                                    <div class="form-input-data">
                                        <label for="primary_legal_counsel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primary Legal Counsel</label>
                                        <input type="text" id="primary_legal_counsel" v-model="form.primary_legal_counsel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Barr. Chukwu" required>
                                        <p class="text-red-500">{{ form.errors.primary_legal_counsel }}</p>
                                    </div>
                                    <div class="form-input-data">
                                        <label for="date_of_profiling" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Profiling</label>
                                        <input type="date" id="date_of_profiling" v-model="form.date_of_profiling" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date of Profiling" required>
                                        <p class="text-red-500">{{ form.errors.date_of_profiling }}</p>
                                    </div>
                                    <div class="form-input-data">
                                        <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                                        <input type="date" id="date_of_birth" v-model="form.date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date of Birth" required>
                                        <p class="text-red-500">{{ form.errors.date_of_birth }}</p>
                                    </div>
                                </div>
                                <div class="mb-5">
                                     <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Profile Image</label>
                                    <input @input="form.profile_image = $event.target.files[0]" class="block p-2.5 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful </div>
                                    <p class="text-red-500">{{ form.errors.profile_image }}</p>
                                </div>
                                <div class="mb-5">
                                     <label for="case_details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Case Details</label>
                                     <textarea name="case_details" id="" cols="30" rows="10"  v-model="form.case_details" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Case Details" required>

                                     </textarea>
                                        
                                        <p class="text-red-500">{{ form.errors.case_details }}</p>
                                </div>
                                        
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                        {{ form.progress.percentage }}%
                                </progress>
                                <button v-else type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>
    
    
                    </div>
                </div>
            </div>
    </GuestLayout>
    </div>
</template>
