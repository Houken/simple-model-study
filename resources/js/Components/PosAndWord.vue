<template>
    <PosBox :first-letter-of-pos="props.word.part_of_speech[0]" />{{
        props.word.english
    }}
</template>

<script setup lang="ts">
import { Word } from '@/types/models';
import PosBox from './PosBox.vue';

const props = defineProps<{
    word: Word;
}>();

</script>

<style scoped></style>
