<script setup>
import Navbar from '@/components/Navbar.vue';
import { Head } from "@inertiajs/inertia-vue3";
import Layout from '@/Layouts/Layout.vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
    user: {
        type: Object,
    },
    posts: {
        type: Array,
    },
})
const form = useForm();

function destroy(id) {
    if (confirm("決してええか？"))
    {
        form.delete(route('posts.destroy', id))
    }
};


</script>
<template>
    <Layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <Navbar />
    </h2>
        </template>



        <Head title="Index" />

        <div id="card" class="flex flex-wrap bg-white shadow-lg rounded-lg m-4 md:mx-auto my-56 max-w-md md:max-w-2xl" v-for="post in posts" :key="user.id">
            <!--horizantil margin is just for display-->
            <div class="flex items-start px-4 py-6">
                <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
                <div class="">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ post.user.name }}</h2>
                        <small class="text-sm text-gray-700">22h ago</small>
                    </div>
                    <p class="text-gray-700">{{ post.title }} </p>
                    <p class="mt-3 text-gray-700 text-sm">
                        {{ post.body }}
                            </p>
                    <button class="bg-green-700" v-if="$page.props.auth.user.id == post.user_id" @click="destroy(post.id)">kesuyo{{ post.id }}</button>
                    <p v-else>chigauyo{{ post.id }}</p>
                    <div class="mt-4 flex items-center">
                        <div class="flex text-gray-700 text-sm mr-3">
                            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span>12</span>
                        </div>
                        <div class="flex mr-2 text-gray-700 text-sm">
                            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                            <span>8</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </Layout>
</template>
