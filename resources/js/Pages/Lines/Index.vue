<template>

    <Head title="Line: INDEX" />

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
                                                    index_no</th>
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
                                            <tr
                                                v-for="line in lines.data"
                                                class="hover:bg-gray-100 dark:hover:bg-neutral-700"
                                            >
                                                <td
                                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ line.id }}</td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ line.book.title }}</td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ line.index_no }}</td>
                                                <td
                                                    class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ line.word.english }}</td>
                                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-start">
                                                    {{ line.definition }}</td>
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

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, InertiaForm, router, useForm } from '@inertiajs/vue3';
import { computed, PropType, ref, watch } from 'vue';
import { Book, Word, Usage, Line } from '@/types/models';

const props = defineProps({
    lines: {
        type: Object as PropType<{ data: Line[] }>,
        default: () => ({ data: [] }),
    },
});
</script>
