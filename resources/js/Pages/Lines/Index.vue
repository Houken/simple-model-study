<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, InertiaForm, router, useForm } from '@inertiajs/vue3';
import { computed, PropType, ref, watch } from 'vue';
import { Book, Word, Usage } from '@/types/models';

const form: InertiaForm<{
    book_id?: number | string,
    word_id?: number,
    index_no?: number,
    definition: string,
    usages: Usage[],
}> = useForm({
    book_id: "",
    word_id: undefined,
    index_no: undefined,
    definition: '',
    usages: [] as Usage[],
});

const props = defineProps({
    books: {
        type: Array as PropType<Book[]>,
        default: () => []
    },
    words: {
        type: Array as PropType<Word[]>,
        default: () => []
    },
    word: {
        type: Object as PropType<Word>,
        default: () => { }
    },
});


let wordSearch = ref<string>(""),
    word_id = ref("");

let wordsUrl = computed(() => {
    let url = new URL(route("lines.create"));
    if (wordSearch.value) {
        url.searchParams.append("wordSearch", wordSearch.value);
    } else if (word_id.value) {
        url.searchParams.append("wordId", word_id.value);
    }
    return url;
});

watch(() => wordsUrl.value,
    (updatedWordsUrl) => {
        console.log(updatedWordsUrl);
        router.visit(updatedWordsUrl, {
            preserveScroll: true,
            preserveState: true,
            replace: true,
        });
    }
);
</script>

<template>

    <Head title="Line: CREATE" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Line: INDEX
            </h2>
        </template>

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                        <thead>
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    id</th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    book</th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    index</th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500"
                                                >
                                                    word</th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500"
                                                >
                                                    definition</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                                <td
                                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    John Brown</td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    45</td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    New York No. 1 Lake Park</td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    New York No. 1 Lake Park</td>
                                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                    <button
                                                        type="button"
                                                        class="inline-flex items-center text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
                                                    >Delete</button>
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
    </AuthenticatedLayout>
</template>
