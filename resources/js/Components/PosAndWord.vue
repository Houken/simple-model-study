<template>
    <span
        class="p-[3px] text-xs text-slate-500 mr-1 border-slate-200 border rounded-sm dark:text-slate-400 dark:border-slate-700"
    >{{
        props.word.part_of_speech[0]
    }}</span>{{
            props.word.english
        }}
</template>

<script setup lang="ts">
import { Word } from '@/types/models';

const props = defineProps<{
    word: Word;
}>();

</script>

<style scoped></style>
