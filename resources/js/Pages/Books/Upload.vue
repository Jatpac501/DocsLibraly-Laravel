<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, router, useForm} from '@inertiajs/vue3';
import { ref } from 'vue';
import Upload from "@/Pages/Books/Upload.vue";

const props = defineProps({
    subjects: Array
});

const form = useForm({
    name: '',
    description: '',
    author: '',
    year: '',
    subject_id: '',
    file: null
});
const fileInput = ref(null);
const submit = () => {
    if (fileInput.value?.files[0]) {
        form.file = fileInput.value.files[0];
    }
    form.post(route("books.store"));
}
</script>

<template>
    <AppLayout title="Загрузка">
        <template #header>
            <div class="flex flex-col items-center">
                <h2 class="font-semibold text-3xl text-gray-900 leading-tight mt-6">
                    Загрузка файла
                </h2>
            </div>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-lg rounded-lg p-6 space-y-6">
                    <form @submit.prevent="submit" class="space-y-4">
                        <div>
                            <label for="subject_id" class="block mb-2 font-medium">Раздел</label>
                            <select  id="subject_id" v-model="form.subject_id" class="bg-transparent border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required>
                                <option v-for="subject in subjects" :key="subject.id" :value="subject.id">{{subject.name}}</option>
                            </select>
                        </div>
                        <div>
                            <label for="name" class="block mb-2 font-medium">Название</label>
                            <input type="text" id="name" v-model="form.name" class="bg-transparent border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="description" class="block mb-2 font-medium">Описание</label>
                            <textarea id="description" v-model="form.description" rows="4" class="bg-transparent border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
                        </div>
                        <div>
                            <label for="author" class="block mb-2 font-medium">Автор</label>
                            <input type="text" id="author" v-model="form.author" class=" bg-transparent border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="year" class="block mb-2 font-medium">Год выпуска</label>
                            <input type="number" id="year" v-model="form.year" class="bg-transparent border border-gray-300  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="file" class="block mb-2 font-medium">Файл</label>
                            <input type="file" id="file" ref="fileInput" class="bg-transparent rounded-lg border border-gray-300 cursor-pointer focus:outline-none block w-full p-2.5"/>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">Загрузить файл</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

