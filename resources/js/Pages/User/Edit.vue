<script setup>
import { Head } from "@inertiajs/inertia-vue3";
// import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from '@/Layouts/Layout.vue'
import Navbar from '@/Components/Navbar.vue'


const props = defineProps({
    user: {
        type: Object,
    },
});


const form = useForm({
    id: props.user.id,
    email: props.user.email,
    name: props.user.name,
    image: null
});

const submit = () => {
    form.put(route('user_update'));
};
</script>


<template>
    <Layout>

        <template #header>
            <Navbar />
        </template>

        <Head title="user edit" />

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <h2 class="items-center text-xl font-semibold leading-tight text-gray-800">User edit</h2>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">name</label>
                                <input type="text" v-model="form.name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.name" class="text-sm text-red-600">
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">email</label>
                                <input  type="email" v-model="form.email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.email" class="text-sm text-red-600">
                                    {{ form.errors.email }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">profile Image</label>
                                <input  type="file" @input="form.image = $event.target.files[0]" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  />
                                <div v-if="form.errors.image" class="text-sm text-red-600">
                                    {{ form.errors.image }}
                                </div>
                            </div>
                            <button type="submit" class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 " :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </Layout>
</template>
