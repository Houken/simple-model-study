<template>

    <Head title="Line: ReOrder Test" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Line: ReOrder Test
            </h2>
        </template>

        <div class="py-4 print:hidden">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div
                                    class="flex items-center justify-center px-4 py-2 space-x-4 bg-slate-200 dark:bg-slate-600">
                                    <div class="flex items-center">
                                        <label
                                            for="select-book"
                                            class="inline-block mr-2 text-sm font-medium text-gray-800 dark:text-neutral-200"
                                        >
                                            Book :
                                        </label>
                                        <select
                                            v-model="bookId"
                                            id="select-book"
                                            class="block px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm w-[16rem] pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        >
                                            <option
                                                selected
                                                value="0"
                                            >単語帳を選択</option>
                                            <option
                                                v-for="book in books.data"
                                                :key="book.id"
                                                :value="book.id"
                                            >{{ book.slug
                                                }} 第{{
                                                    book.version }}版
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <label
                                            for="indexNoFrom"
                                            class="-mr-1 text-xs font-medium text-gray-800 dark:text-neutral-200"
                                        >From: </label>
                                        <select
                                            id="indexNoFrom"
                                            v-model="indexNoFrom"
                                            class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm text-end pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        >
                                            <option v-for="n in props.books.data[Number(bookId) - 1].max_index / 100">{{
                                                n * 100 - 99 }}
                                            </option>
                                        </select>
                                        <label
                                            for="indexNoTo"
                                            class="-mr-1 text-xs font-medium text-gray-800 dark:text-neutral-200"
                                        >To:</label>
                                        <select
                                            id="indexNoTo"
                                            v-model="indexNoTo"
                                            class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        >
                                            <option v-for="n in props.books.data[Number(bookId) - 1].max_index / 100">{{
                                                n * 100 }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                        <thead>
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="w-[4rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    index</th>
                                                <th
                                                    scope="col"
                                                    class="w-[16rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    usage</th>
                                                <th
                                                    scope="col"
                                                    class="w-[4rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-center dark:text-neutral-500"
                                                >
                                                    translation</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            <tr
                                                v-for="(line, index) in props.lines"
                                                :key="index"
                                                class="font-normal hover:bg-gray-100 dark:hover:bg-neutral-700"
                                            >
                                                <td
                                                    class="relative px-6 py-2 text-sm text-center text-gray-800 whitespace-nowrap dark:text-neutral-200 hover:bg-slate-200">
                                                    {{ index + 1 }}
                                                </td>
                                                <td
                                                    class="px-6 py-2 text-xs text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ line.usages[0].ordered_words }}
                                                </td>
                                                <td
                                                    class="px-6 py-2 text-xs text-gray-800 text-start whitespace-nowrap dark:text-neutral-200">
                                                    <ExampleDecode :text="line.usages[0].translation" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- for print Questions -->
        <div
            id="for-print-questions"
            class="hidden bg-white print:block w-a4 h-a4"
        >
            <div class="font-medium text-center">
                <h1 class="flex items-center justify-center gap-x-2">語順整序テスト<span class="text-xs">( {{
                    props.books.data[Number(bookId - 1)].title
                        }}</span><span class="text-xs">from
                        {{
                            indexNoFrom }}
                        to {{
                            indexNoTo
                        }} )</span></h1>
            </div>

            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                <thead>
                    <tr>
                        <th
                            scope="col"
                            class="w-[1rem] px-4 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                        >
                            No.</th>
                        <th
                            scope="col"
                            class="w-[16rem] px-4 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                        >
                            Question</th>
                        <th
                            scope="col"
                            class="w-auto px-4 py-2 text-xs font-medium text-center text-gray-500 uppercase dark:text-neutral-500"
                        >
                            Your Answer</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    <tr
                        v-for="(line, index) in props.lines"
                        :key="index"
                        class="font-normal hover:bg-gray-100 dark:hover:bg-neutral-700"
                    >
                        <td
                            class="relative px-4 py-2 text-sm text-center text-gray-800 whitespace-nowrap dark:text-neutral-200 hover:bg-slate-200">
                            {{ index + 1 }}
                        </td>
                        <td class="px-4 py-2 text-xs text-gray-800 text-start whitespace-nowrap dark:text-neutral-200">
                            <div class="flex flex-col"><span>
                                    <ExampleDecode :text="line.usages[0].translation" />
                                </span><span>{{
                                    line.usages[0].ordered_words }}</span></div>
                        </td>
                        <td class="px-4 py-2 text-xs text-gray-800 whitespace-nowrap dark:text-neutral-200">

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- for print Answers -->
        <div
            id="for-print-answers"
            class="hidden bg-white break-before-page print:block w-a4 h-a4"
        >
            <div class="font-medium text-center">
                <h1 class="flex items-center justify-center gap-x-2">語順整序テスト<span class="text-xs">( {{
                    props.books.data[Number(bookId - 1)].title
                        }}</span><span class="text-xs">from
                        {{
                            indexNoFrom }}
                        to {{
                            indexNoTo
                        }} 正解)</span></h1>
            </div>

            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                <thead>
                    <tr>
                        <th
                            scope="col"
                            class="w-[1rem] px-4 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                        >
                            No.</th>
                        <th
                            scope="col"
                            class="w-[16rem] px-4 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                        >
                            Answer</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    <tr
                        v-for="(line, index) in props.lines"
                        :key="index"
                        class="font-normal hover:bg-gray-100 dark:hover:bg-neutral-700"
                    >
                        <td
                            class="relative px-4 py-3 text-center text-gray-800 text-md whitespace-nowrap dark:text-neutral-200 hover:bg-slate-200">
                            {{ index + 1 }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 text-start whitespace-nowrap dark:text-neutral-200">
                            <div class="flex flex-col"><span>
                                    <ExampleDecode :text="line.usages[0].example" />
                                </span></div>
                        </td>
                        <td class="px-4 py-2 text-xs text-gray-800 whitespace-nowrap dark:text-neutral-200">

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, InertiaForm, Link, router, useForm, usePage } from '@inertiajs/vue3';
import { computed, PropType, ref, watch } from 'vue';
import { Book, Word, Usage, Line, linkObj } from '@/types/models';
import Pagination from '@/Components/Pagination.vue';
import { BookDownIcon } from 'lucide-vue-next';
import PosAndWord from '@/Components/PosAndWord.vue';
import TitleAndVersion from '@/Components/TitleAndVersion.vue';
import ExampleDecode from '@/Components/ExampleDecode.vue';

const props = defineProps({
    lines: {
        type: Object,
    },
    books: {
        type: Object as PropType<{ data: Book[] }>,
        default: () => ({ data: [] }),
    },
    bookId: {
        type: Number,
        default: 1,
    },
    indexNoFrom: {
        type: Number,
        default: 1,
    },
    indexNoTo: {
        type: Number,
        default: 100,
    },
});

let bookId = ref(props.bookId ?? "1"),
    indexNoFrom = ref(props.indexNoFrom),
    indexNoTo = ref(props.indexNoTo),
    pageNumber = ref(1),
    wordFilter = ref(usePage().props.wordFilter ?? "");

const validateIndexNoFrom = (value: number): void => {
    if (value > indexNoTo.value) {
        indexNoTo.value = value + 99;
    }
};

const validateIndexNoTo = (value: number): void => {
    if (value < indexNoFrom.value) {
        indexNoFrom.value = value - 99;
    }
};

watch(indexNoFrom, validateIndexNoFrom);
watch(indexNoTo, validateIndexNoTo);

const updatedPageNumber = (link: linkObj) => {
    pageNumber.value = parseInt(link.url.split("=")[1]);
};

let linesUrl = computed(() => {
    let url = new URL(route('lines.reorderTest'));
    if (wordFilter.value) {
        url.searchParams.append("wordFilter", wordFilter.value.toString());
    }
    if (bookId.value) {
        url.searchParams.append("book", bookId.value.toString());
    }
    if (indexNoFrom.value) {
        url.searchParams.append("from", indexNoFrom.value.toString());
    }

    if (indexNoTo.value) {
        url.searchParams.append("to", indexNoTo.value.toString());
    }
    return url;
});

watch(() => linesUrl.value, (updatedLinesUrl) => {
    router.visit(updatedLinesUrl, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
    });
});

watch(
    () => wordFilter.value,
    (value) => {
        if (value) {
            pageNumber.value = 1;
        }
    }
);
</script>
