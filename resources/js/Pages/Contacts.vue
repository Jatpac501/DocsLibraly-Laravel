<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    contacts: Object
});
</script>

<template>
    <AppLayout title="Контакты">
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight mt-3">
                Контакты
            </h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-lg rounded-lg p-6 grid grid-cols-2 gap-6 lg:gap-8">
                    <div v-for="contact in contacts" :key="contact.id" class="bg-gray-100 p-4 rounded-md flex flex-col gap-2 w-auto">
                        <div class="text-lg font-semibold text-gray-800">
                            <span class="border border-current px-2 py-1 rounded mr-2">{{ contact.post }}</span>
                        </div>
                        <div class="text-lg text-gray-800">
                            {{ contact.name }}
                        </div>
                        <div class="text-lg text-gray-700">
                            +7{{ contact.phone }} <a :href="`mailto:${contact.email}`" class="text-blue-600 hover:underline ml-2">{{ contact.email }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
