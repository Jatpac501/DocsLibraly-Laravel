<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, router} from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import TypeFile from '@/Pages/Books/Partials/TypeFile.vue';

const props = defineProps({
    subject: Object,
    books: Object,
    admin: Boolean
});

function formatNumber(value) {
    if (value >= 1000000) {
        return (value / 1000000).toFixed(2) + ' млн.';
    } else if (value >= 1000) {
        return (value / 1000).toFixed(0) + ' тыс.';
    }
    return value.toString();
}

function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('ru-RU', options);
}
</script>

<template>
    <AppLayout :title="subject.name">
        <template #header>
            <div class="flex flex-col items-center">
                <h2 class="font-semibold text-3xl text-gray-900 leading-tight mt-6">
                    {{ subject.name }}
                </h2>
                <Link
                    v-if='admin'
                    :href="route('books.upload')"
                    class="mt-4 px-4 py-2 border rounded-md bg-indigo-500 text-white hover:bg-indigo-600"
                >
                    Загрузить
                </Link>
                <Pagination :links="books.links" class="mt-4" />
            </div>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-lg rounded-lg p-6 space-y-6">
                    <div v-if="books.data.length === 0" class="text-gray-700 text-xl text-center">
                        Нет доступных книг на данный момент
                    </div>
                    <div v-else>
                        <ul class="space-y-4">
                            <li
                                v-for="book in books.data"
                                :key="book.id"
                                class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-150 ease-in-out rounded-lg p-4"
                            >
                                <Link
                                    :href="`/books/${book.id}`"
                                    class="flex flex-col"
                                >
                                    <div class="flex items-center gap-4 mb-2">
                                        <TypeFile :type="book.type" />
                                        <div>
                                            <div class="text-lg font-semibold text-gray-800">
                                                {{ book.name }}
                                            </div>
                                            <div class="text-md text-gray-700">
                                                Автор: {{ book.author }}
                                            </div>
                                            <div class="text-md text-gray-700">
                                                Год издания: {{ book.year }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between text-md text-gray-500">
                                        <div>Дата публикации: {{ formatDate(book.created_at) }}</div>
                                        <div>Просмотры: {{ formatNumber(book.views) }}</div>
                                    </div>
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
