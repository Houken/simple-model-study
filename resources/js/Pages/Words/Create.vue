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
                                <div class="flex items-center">
                                    <input
                                        v-model="form.english"
                                        id="word-english"
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                    <button
                                        @click="insertTilde('word-english', '〜')"
                                        type="button"
                                        class="ml-2 flex shrink-0 justify-center items-center gap-2 size-[38px] text-sm font-medium rounded-lg border border-transparent bg-blue-300 text-white hover:bg-blue-400 focus:outline-none focus:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    >〜</button>
                                    <button
                                        @click="insertTilde('word-english', '…')"
                                        type="button"
                                        class="ml-2 flex shrink-0 justify-center items-center gap-2 size-[38px] text-sm font-medium rounded-lg border border-transparent bg-blue-300 text-white hover:bg-blue-400 focus:outline-none focus:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    >…</button>
                                </div>

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
                                <input
                                    type="text"
                                    list="part_of_speech_list"
                                    v-model="form.part_of_speech"
                                    placeholder="品詞を入力・選択"
                                    class="mt-2 rounded-md bg-slate-50 border-slate-400"
                                >
                                <datalist id="part_of_speech_list">
                                    <option v-for="pos in props.list_of_part_of_speech">{{ pos }}</option>
                                </datalist>
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
import { Head, InertiaForm, useForm } from '@inertiajs/vue3';
import { onMounted, PropType } from 'vue';
import { Word } from '@/types/models';
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
    list_of_part_of_speech: {
        type: Array,
        default: [],
    },
});

onMounted(() => {
    document.getElementById('word-english')?.focus();
});

// キャレット位置にティルダなどを挿入
const insertTilde = (id: string, special: string) => {
    // 指定されたidで、目的の入力ボックスを決定
    const input = document.getElementById(id) as HTMLInputElement;
    // キャレット位置と入力値を取得
    const position = input.selectionStart || 0;
    const text = input.value || "";

    // 指定された文字をキャレットの位置に挿入し、入力値と置き換える
    const newValue = text.slice(0, position) + special + text.slice(position);
    form.english = newValue;
    // 挿入した文字に合わせて、キャレット位置をずらす
    input.setSelectionRange(position + 1, position + 1);
}
</script>
