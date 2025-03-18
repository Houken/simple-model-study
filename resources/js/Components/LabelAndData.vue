<template>
    <div class="my-1 sm:col-span-3">
        <h2
            for="book-select"
            class="inline-block text-sm font-medium text-gray-500 dark:text-neutral-500"
        >
            {{ props.label }}
        </h2>
    </div>
    <div class="my-1 sm:col-span-9">
        <p
            class="block w-full px-4 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
            {{ props.dataToView }}</p>
    </div>
</template>

<script setup lang="ts">
const props = defineProps({
    label: {
        type: String,
        default: 'Specify a title.'
    },
    dataToView: {
        type: String,
        default: 'Give me some data.',
    }
})
</script>

<style scoped></style>
