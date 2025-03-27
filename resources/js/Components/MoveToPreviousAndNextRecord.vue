<template>
    <div class="flex ml-4">
        <div v-if="!prevItem">
            <SquareChevronLeft
                :size="24"
                :stroke-width="1"
                class="dark:text-white/75 opacity-20 dark:hover:text-white active:bg-yellow-900"
            />
        </div>
        <Link
            :href="route('lines.show', { line: prevItem })"
            v-if="prevItem"
        >
        <SquareChevronLeft
            :size="24"
            :stroke-width="1"
            class="dark:text-white/75 dark:hover:text-white active:bg-yellow-900"
        />
        </Link>
        <Link
            :href="route('lines.show', { line: nextItem })"
            v-if="props.nextLineExists"
        >
        <SquareChevronRight
            :size="24"
            :stroke-width="1"
            class="dark:text-white/75 dark:hover:text-white active:bg-yellow-900"
        />
        </Link>
        <div v-if="!props.nextLineExists">
            <SquareChevronRight
                :size="24"
                :stroke-width="1"
                class="dark:text-white/75 opacity-10 dark:hover:text-white active:bg-yellow-900"
            />
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { SquareChevronLeft, SquareChevronRight } from 'lucide-vue-next';
import { computed } from 'vue';

const props = defineProps<{
    id: number | undefined,
    nextLineExists: boolean
}>();

const prevItem = computed(() => {
    if (props.id && props.id > 1) {
        return props.id - 1;
    } else {
        return false;
    }
});

const nextItem = computed(() => {
    if (props.id) {
        return props.id + 1;
    }
});
</script>

<style scoped></style>
