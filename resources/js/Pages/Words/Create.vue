<template>

    <Head title="Word: CREATE" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Word: CREATE
            </h2>
        </template>

        <div class="py-4">
            <!-- Card Section -->
            <div class="max-w-4xl px-4 py-10 mx-auto sm:px-6 lg:px-8 lg:py-4">
                <!-- Card -->
                <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-800">
                    <form @submit.prevent="form.post(route('words.store'))">
                        <!-- Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <SectionTitle title="Word info." />
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                    English
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <input
                                    v-model="form.english"
                                    id="word-english"
                                    type="text"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                            </div>
                            <div
                                v-if="form.errors.english"
                                class="col-span-9 col-start-4 -mt-4 font-bold text-red-400"
                            >{{
                                form.errors.english
                                }}</div>
                            <!-- End Col -->


                            <div class="sm:col-span-3">
                                <label
                                    for="line-partOfSpeech"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Part of Speech
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <input
                                    v-model="form.part_of_speech"
                                    id="line-partOfSpeech"
                                    type="text"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                            </div>
                            <div
                                v-if="form.errors.part_of_speech"
                                class="col-span-9 col-start-4 -mt-4 font-bold text-red-400"
                            >
                                {{
                                    form.errors.part_of_speech
                                }}</div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->


                        <div class="flex justify-end mt-5 gap-x-2">
                            <button
                                type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                            >
                                Cancel
                            </button>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            >
                                Save
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Card Section -->
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, InertiaForm, router, useForm, usePage } from '@inertiajs/vue3';
import { computed, PropType, ref, watch } from 'vue';
import { Word } from '@/types/models';
import { CirclePlus, Filter } from 'lucide-vue-next';
import SectionTitle from '@/Components/SectionTitle.vue';

const form: InertiaForm<{
    word_id?: number,
    english?: string,
    part_of_speech: string,
}> = useForm({
    word_id: undefined,
    english: '',
    part_of_speech: '',
});

const props = defineProps({
    word: {
        type: Object as PropType<Word>,
        default: () => { }
    },
});
</script>
