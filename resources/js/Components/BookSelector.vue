<template>
    <select
        :value="modelValue"
        id="book-select"
        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500 dark:focus:ring-slate-600"
        @change="$emit('update:modelValue', ($event.target as HTMLSelectElement).value)"
    >
        <option
            value=""
            disabled
        >単語集を選択</option>
        <option
            v-for="book in books"
            :key="book.id"
            :value="book.id"
            :selected="book.id === selectedBookId"
        >
            <BookAndVersion :book="book" />
        </option>
    </select>
</template>

<script setup lang="ts">
import { Book } from '@/types/models';
import BookAndVersion from './BookAndVersion.vue';

defineProps<{
    modelValue: number | string | undefined,
    books: Book[],
    selectedBookId?: number
}>();

defineEmits(['update:modelValue']);
</script>