<template>
    <span class="p-[3px] text-xs text-gray-800 mr-1  dark:text-neutral-200">{{
        props.book.title
    }} - {{
            props.book.version
        }}</span>
</template>

<script setup lang="ts">
import { Book } from '@/types/models';

const props = defineProps<{
    book: Book;
}>();

</script>

<style scoped></style>
