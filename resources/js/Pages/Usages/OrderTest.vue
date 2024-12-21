<template>
    <div>
        <ul>
            <li
                v-for="usage in props.usages.data"
                :key="usage.id"
            >
                <p>
                    <ExampleDecode :text="usage.translation" />
                </p>
                <p>{{ usage.ordered_words }}</p>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import ExampleDecode from '@/Components/ExampleDecode.vue';
import { Usage } from '@/types/models';

const props = defineProps<{
    usages: {
        data: Usage[];
    };
}>();
</script>

<style scoped></style>
