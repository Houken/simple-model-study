<template>
    <span>{{ book.title }} 第{{ book.version }}版</span>
</template>

<script setup lang="ts">
import type { PropType } from 'vue';
import { Book } from '@/types/models';

defineProps({
    book: {
        type: Object as PropType<Book>,
        required: true
    }
});
</script>

<style scoped></style>
