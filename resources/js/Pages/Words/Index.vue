<template>

    <Head title="Line: INDEX" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Word: INDEX
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
                                                    word</th>
                                                <th
                                                    scope="col"
                                                    class="w-auto px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    pos</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            <tr
                                                v-for="word in words.data"
                                                :key="word.id"
                                                class="hover:bg-gray-100 dark:hover:bg-neutral-700"
                                            >
                                                <td
                                                    class="relative px-6 py-2 text-sm font-medium text-center text-gray-800 whitespace-nowrap dark:text-neutral-200 hover:bg-slate-200">
                                                    <Link
                                                        :href="route('words.show', { word: word.id })"
                                                        class="absolute inset-0 pt-2"
                                                    >{{ word.id }}
                                                    </Link>
                                                </td>
                                                <td
                                                    class="px-6 py-2 text-sm text-gray-800 text-start whitespace-nowrap dark:text-neutral-200">
                                                    {{ word.english }}</td>
                                                <td
                                                    class="px-6 py-2 text-sm font-medium whitespace-nowrap text-start dark:text-neutral-200">
                                                    {{ word.part_of_speech }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <Pagination
                                    :data="words"
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

const props = defineProps({
    words: {
        type: Object as PropType<{ data: Word[] }>,
        default: () => ({ data: [] }),
    },
});

let pageNumber = ref(1);

const updatedPageNumber = (link: linkObj) => {
    pageNumber.value = parseInt(link.url.split("=")[1]);
};

let wordsUrl = computed(() => {
    let url = new URL(route('words.index'));
    url.searchParams.append("page", pageNumber.value.toString());
    return url;
})

watch(() => wordsUrl.value, (updatedWordsUrl) => {
    router.visit(updatedWordsUrl, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
    });
});
</script>
