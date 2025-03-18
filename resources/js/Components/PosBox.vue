<template>
    <span
        class="py-[2px] px-[3px] text-xs text-slate-500 mr-1 border-slate-200 border rounded-sm dark:text-slate-400 dark:border-slate-700"
    >{{
        props.firstLetterOfPos
        }}</span>
</template>

<script setup lang="ts">
const props = defineProps<{
    firstLetterOfPos: string;
}>();

</script>

<style scoped></style>
