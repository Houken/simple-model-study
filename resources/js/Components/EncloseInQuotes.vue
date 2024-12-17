<template>
    <button
        @click="encloseSentencesInQuotes(props.elementId || '', props.quote || '')"
        type="button"
        class="flex shrink-0 justify-center items-center gap-2 size-[34px] text-xl font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
    >{{ props.quote }}</button>
</template>

<script setup lang="ts">
import { encloseSentencesInQuotes } from '@/Utils/InputUtils';

const props = defineProps({
    elementId: String,
    quote: String,
})

</script>

<style scoped></style>
