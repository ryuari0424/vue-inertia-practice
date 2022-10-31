<script setup>
import { Head } from "@inertiajs/inertia-vue3";
// import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Layout from '@/Layouts/Layout.vue'
import Navbar from '@/Components/Navbar.vue'


const props = defineProps({
    posts: {
        type: Array,
        default: () => ({}),
    },
});


const form = useForm({
    title: '',
    body: '',

});

const submit = () => {
    form.post(route("posts.store"));
};
</script>

<template>
    <Layout>

        <template #header>
            <Navbar />
        </template>

        <Head title="Index" />

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800">create posts</h2>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="Title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                                <input type="text" v-model="form.title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.title" class="text-sm text-red-600">
                                    {{ form.errors.title }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Body</label>
                                <input type="text" v-model="form.body" name="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" />
                                <div v-if="form.errors.body" class="text-sm text-red-600">
                                    {{ form.errors.body }}
                                </div>
                            </div>
                            <button type="submit" class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 " :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </Layout>
</template>
