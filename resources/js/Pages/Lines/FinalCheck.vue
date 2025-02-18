<template>

    <Head title="Line: INDEX" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Line: finalCheck
            </h2>
        </template>

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <!-- header -->
                                <div
                                    class="flex items-center justify-center px-4 py-2 space-x-4 print:hidden bg-slate-200 dark:bg-slate-600">
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


                                </div>
                                <!-- check list -->
                                <div class="overflow-hidden">
                                    <h1 class="hidden font-serif text-sm font-bold print:block place-self-center">
                                        ファイナルチェックシート
                                    </h1>
                                    <div class="flex flex-row print:w-[280mm] print:h-[190mm]">
                                        <!-- first half -->
                                        <table class="divide-y divide-gray-200 print:basis-1/2 dark:divide-neutral-700">
                                            <thead>
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="w-[2rem] px-3 py-1 text-xs font-medium text-gray-500 uppercase text-center dark:text-neutral-500"
                                                    >
                                                        ID</th>
                                                    <th
                                                        scope="col"
                                                        class="w-[13rem] px-6 print:px-3 py-1 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                    >
                                                        word</th>
                                                    <th
                                                        scope="col"
                                                        class="w-[19rem] px-6 py-1 overflow-hidden text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500 print:overflow-auto"
                                                    >
                                                        definition</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                <tr
                                                    v-for="line in firstHalf"
                                                    :key="line.id"
                                                    class="hover:bg-gray-100 dark:hover:bg-neutral-700"
                                                >
                                                    <td
                                                        class="flex flex-row items-center justify-between px-3 py-1 text-xs text-center text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                        {{ line.index_no }}
                                                        <SquareSlash
                                                            :size="20"
                                                            color="#474747"
                                                            :stroke-width="1"
                                                        />
                                                    </td>
                                                    <td
                                                        class="px-6 py-1 font-serif text-xs text-gray-800 print:px-3 whitespace-nowrap dark:text-neutral-200">
                                                        {{ line.word.english }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-1 text-xs font-medium print:px-3 whitespace-wrap text-start dark:text-neutral-200 print:text-red-sheet">
                                                        {{ line.definition }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- second half -->
                                        <table class="divide-y divide-gray-200 print:basis-1/2 dark:divide-neutral-700">
                                            <thead>
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="w-[2rem] px-3 py-1 text-xs font-medium text-gray-500 uppercase text-center dark:text-neutral-500"
                                                    >
                                                        ID</th>
                                                    <th
                                                        scope="col"
                                                        class="w-[13rem] px-6 print:px-3 py-1 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                    >
                                                        word</th>
                                                    <th
                                                        scope="col"
                                                        class="w-[19rem] px-6 py-1 overflow-hidden text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500 print:overflow-auto"
                                                    >
                                                        definition</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                <tr
                                                    v-for="line in secondHalf"
                                                    :key="line.id"
                                                    class="hover:bg-gray-100 dark:hover:bg-neutral-700"
                                                >
                                                    <td
                                                        class="flex flex-row items-center justify-between px-3 py-1 text-xs text-center text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                        {{ line.index_no }}
                                                        <SquareSlash
                                                            :size="20"
                                                            color="#474747"
                                                            :stroke-width="1"
                                                        />
                                                    </td>
                                                    <td
                                                        class="px-6 py-1 font-serif text-xs text-gray-800 print:px-3 whitespace-nowrap dark:text-neutral-200">
                                                        {{ line.word.english }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-1 text-xs font-medium print:px-3 whitespace-wrap text-start dark:text-neutral-200 print:text-red-sheet">
                                                        {{ line.definition }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- pagination -->
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
import { Head, router, usePage } from '@inertiajs/vue3';
import { computed, PropType, ref, watch } from 'vue';
import { Book, Line, linkObj } from '@/types/models';
import Pagination from '@/Components/Pagination.vue';
import { SquareSlash } from 'lucide-vue-next';

// Variables
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

// linesが更新されたら、要素を20個ずつに区切った二つの配列に分ける。
const firstHalf = ref<Line[]>([]);
const secondHalf = ref<Line[]>([]);

watch(
    () => props.lines,
    (newLines) => {
        const linesData = newLines.data;
        firstHalf.value = linesData.slice(0, 20);
        secondHalf.value = linesData.slice(20, 40);
    },
    { immediate: true }
);

let bookId = ref(usePage().props.book ?? "0"),
    pageNumber = ref(1);

const updatedPageNumber = (link: linkObj) => {
    pageNumber.value = parseInt(link.url.split("=")[1]);
};

let linesUrl = computed(() => {
    let url = new URL(route('lines.finalCheck'));
    url.searchParams.append("page", pageNumber.value.toString());
    if (bookId.value) {
        url.searchParams.append("book", bookId.value.toString());
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
</script>
