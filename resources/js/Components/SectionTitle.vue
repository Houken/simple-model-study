<template>
    <div class="py-3 -mt-8 -mx-7 pl-7 sm:col-span-12 bg-slate-200">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
            {{ title }}
        </h2>
    </div>
</template>

<script setup lang="ts">
defineProps({
    title: {
        type: String,
        default: 'Specify a title.'
    }
})
</script>

<style scoped></style>
