<template>
  <Link
    type="button"
    :href="route(testRoute ?? 'test.word.ej')"
    :class="`p-4 hs-tooltip bg-${bgColor} flex items-center justify-center rounded-full w-64 h-24 mx-auto font-black text-2xl
  transition delay-100 duration-300 ease-in-out hover:bg-gray-500 hover:text-white`"
  >{{ message
  }}<span
    :class="`hs-tooltip-content [--placement:${tipPlacement}] rounded-sm hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900/50 text-white text-sm`"
    role="tooltip"
  >{{ tip }}</span></Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
  message?: string,
  bgColor?: string
  tip?: string,
  tipPlacement?: string,
  testRoute?: string
}>();

</script>

<style scoped></style>