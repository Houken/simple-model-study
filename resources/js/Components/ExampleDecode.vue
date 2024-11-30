<template>
    <div>
        <span
            v-html="formattedText"
            class="select-none"
        ></span>
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    text: {
        type: String
    }
})
// console.log(props.text)
const formattedText = computed(
    text => {
        let asterisked = props.text.replace(/\*(.*?)\*/g, '<span class="font-bold text-red-500">$1</span>')
        let backquoted = asterisked.replace(/`(.*?)`/g, '<span class="underline">$1</span>')

        return backquoted
    }
)
</script>

<style lang="scss" scoped></style>
