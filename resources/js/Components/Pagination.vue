<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    links: Array
});
</script>

<template>
    <nav class="flex my-4 justify-center text-lg text-center ">
        <div class="inline-flex rounded-md gap-2">
            <Link
                v-for="link in links"
                :key="link.url || link.label"
                :href="link.url || '#'"
                :class="[
                    'px-4 py-2 border rounded-md',
                    link.active ? 'bg-indigo-500 text-white hover:bg-indigo-600' : 'text-gray-700 bg-white hover:bg-gray-100 ',
                    link.url ? 'border-gray-300' : 'opacity-50 pointer-events-none cursor-not-allowed'
                ]"
            >
                <span v-if="link.label.includes('Previous')">&laquo;</span>
                <span v-else-if="link.label.includes('Next')">&raquo;</span>
                <span v-else v-html="link.label"></span>
            </Link>
        </div>
    </nav>
</template>
