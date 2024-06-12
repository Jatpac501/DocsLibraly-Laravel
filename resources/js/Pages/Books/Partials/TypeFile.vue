<script setup>
import { computed } from 'vue';

const props = defineProps({
    type: String
});

const fileTypes = {
    doc: ['docx', 'doc', 'odt', 'rtf'],
    sheet: ['xlsx', 'xls', 'csv', 'ods'],
    presentation: ['ppt', 'pptx', 'odp'],
    pdf: ['pdf']
};

const typeToClassMap = {
    doc: 'bg-blue-200 text-blue-800',
    sheet: 'bg-green-200 text-green-800',
    presentation: 'bg-orange-200 text-orange-800',
    pdf: 'bg-red-200 text-red-800'
};

const badgeClass = computed(() => {
    const fileTypeLower = props.type.toLowerCase();
    for (const [key, extensions] of Object.entries(fileTypes)) {
        if (extensions.includes(fileTypeLower)) {
            return typeToClassMap[key];
        }
    }
    return 'bg-gray-200 text-gray-800';
});
</script>

<template>

    <div :class="badgeClass" class="size-8 min-w-8 flex items-center justify-center font-bold rounded-md transform">
        {{ props.type }}
    </div>
</template>
