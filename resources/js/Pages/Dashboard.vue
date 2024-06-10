<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    subjects: Array
});
</script>

<template>
    <AppLayout title="Библиотека">
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight mt-3">
                Главная
            </h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="subject in subjects" :key="subject.id" class="flex content-center gap-3 mb-1">
                    <Link :href="`/subjects/${subject.id}`" class="flex-1 bg-white mb-3 px-5 py-3 shadow rounded-md hover:bg-gray-100 transition duration-200 ease-in-out">
                        <h2 class="text-xl text-gray-800 font-bold flex items-center gap-2">
                            {{ subject.name }}
                        </h2>
                    </Link>
                    <div class="text-xl text-center w-24 bg-white mb-3 px-5 py-3 shadow rounded-md hover:bg-gray-100 transition duration-200 ease-in-out content-center">
                        {{ subject.books_count }}
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
