<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { computed } from 'vue';

const props = defineProps({
    bookCount: Number
});
const getPublicationText = (count) => {
    const cases = [2, 0, 1, 1, 1, 2];
    const titles = ['публикация', 'публикации', 'публикаций'];
    return titles[
        (count % 100 > 4 && count % 100 < 20) ? 2 : cases[(count % 10 < 5) ? count % 10 : 5]
        ];
};

const publicationText = computed(() => `${props.bookCount} ${getPublicationText(props.bookCount)}`);
</script>

<template>
    <AppLayout title="Об ЭВБ">
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight mt-3">
                Сведения о библиотеке
            </h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">
                        Полнотекстовая база учебных, учебно-методических и научных изданий Ульяновского института гражданской авиации имени Главного маршала авиации Б. П. Бугаева
                    </h1>
                    <div class="text-xl text-gray-700 mb-4">
                        🏷️ Количество материала: <span class="font-semibold">{{ publicationText }}</span>
                    </div>
                    <div class="text-xl text-gray-700 mb-4">
                        📚 Содержит издания по изучаемым в институте дисциплинам
                    </div>
                    <div class="text-xl text-gray-700 mb-4">
                        🎓 Предназначена для обеспечения обучающихся необходимыми учебно-методическими пособиями
                    </div>
                    <div class="text-xl text-gray-700 mb-4">
                        🌐 Доступ предоставляется для всех категорий обучающихся института
                    </div>
                    <div class="text-xl text-gray-700 mb-4">
                        🔐 Для получения логина и пароля просим обращаться в Информационно-библиографический сектор НТБ, кабинет 224 (УК-1)
                    </div>
                    <div class="text-xl text-gray-700 mb-4">
                        🏢 Адрес учредителя: <span class="font-semibold">432071, Ульяновская область, г. Ульяновск, ул. Можайского 8/8</span>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
