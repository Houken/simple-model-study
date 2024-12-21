<template>

    <Head title="Line: ReOrder Test" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Line: ReOrder Test
            </h2>
        </template>

        <div class="py-4">
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
                                                    id</th>
                                                <th
                                                    scope="col"
                                                    class="w-[16rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    book</th>
                                                <th
                                                    scope="col"
                                                    class="w-[4rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-center dark:text-neutral-500"
                                                >
                                                    index_no</th>
                                                <th
                                                    scope="col"
                                                    class="w-[16rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    word</th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    definition</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            <tr
                                                v-for="line in lines.data"
                                                :key="line.id"
                                                class="hover:bg-gray-100 dark:hover:bg-neutral-700"
                                            >
                                                <td
                                                    class="relative px-6 py-2 text-sm font-medium text-center text-gray-800 whitespace-nowrap dark:text-neutral-200 hover:bg-slate-200">
                                                    <Link
                                                        :href="route('lines.show', { line: line.id })"
                                                        class="absolute inset-0 pt-2"
                                                    >{{ line.id }}
                                                    </Link>
                                                </td>
                                                <td
                                                    class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    <TitleAndVersion :book="line.book" />
                                                </td>
                                                <td
                                                    class="px-6 py-2 text-sm text-center text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ line.index_no }}</td>
                                                <td
                                                    class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    <PosAndWord :word="line.word" />
                                                </td>
                                                <td
                                                    class="px-6 py-2 text-sm font-medium whitespace-nowrap text-start dark:text-neutral-200">
                                                    {{ line.definition }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <Pagination
                                    :data="lines"
                                    :updated-page-number="updatedPageNumber"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

const props = defineProps({
    lines: {
        type: Object as PropType<{ data: Line[] }>,
        default: () => ({ data: [] }),
    },
    books: {
        type: Object as PropType<{ data: Book[] }>,
        default: () => ({ data: [] }),
    },
});

let bookId = ref(usePage().props.book ?? "0"),
    indexNoFrom = ref("1"),
    indexNoTo = ref("100"),
    pageNumber = ref(1),
    wordFilter = ref(usePage().props.wordFilter ?? "");

const validateIndexNoFrom = (value: string) => {
    if (parseInt(value) > parseInt(indexNoTo.value)) {
        indexNoTo.value = (parseInt(value) + 99).toString();
    }
};

const validateIndexNoTo = (value: string) => {
    if (parseInt(value) < parseInt(indexNoFrom.value)) {
        indexNoFrom.value = (parseInt(value) - 99).toString();
    }
};

watch(indexNoFrom, validateIndexNoFrom);
watch(indexNoTo, validateIndexNoTo);

const updatedPageNumber = (link: linkObj) => {
    pageNumber.value = parseInt(link.url.split("=")[1]);
};

let linesUrl = computed(() => {
    let url = new URL(route('lines.reorderTest'));
    url.searchParams.append("page", pageNumber.value.toString());
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
