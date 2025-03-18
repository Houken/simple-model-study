<template>
    <div class="flex items-center justify-between py-2 mb-4 -mx-4 sm:col-span-12 bg-slate-200 dark:bg-slate-600">
        <div class="pl-4">
            <h2 class="text-sm font-semibold text-gray-800 dark:text-neutral-200">
                {{ title }}
            </h2>
        </div>
        <div class="pr-4">
            <slot name="actions"></slot>
        </div>
    </div>
    <div class="grid content-center grid-cols-12 gap-2 m-4">
        <slot></slot>
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
