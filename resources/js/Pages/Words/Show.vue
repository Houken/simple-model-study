<template>

    <Head title="Word: Show" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Word: Show
            </h2>
        </template>

        <div class="py-4">
            <!-- Card Section -->
            <div class="max-w-4xl px-4 py-10 mx-auto sm:px-6 lg:px-8 lg:py-4">
                <!-- Card -->
                <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-800">
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
                                <p class="text-gray-800 dark:text-neutral-200">
                                    {{
                                        word.english }}</p>
                            </div>

                        </div>
                        <!-- End Col -->


                        <div class="sm:col-span-3">
                            <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                Part of Speech
                            </h2>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <p class="text-gray-800 dark:text-neutral-200">{{ word.part_of_speech }}</p>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Section -->
                    <!-- Section for Lines -->
                    <div
                        class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                        <SectionTitle title="Lines" />
                        <div class="sm:col-span-12">
                            <div class="flex flex-col">
                                <div class="-m-1.5 overflow-x-auto">
                                    <div class="p-1.5 min-w-full inline-block align-middle">
                                        <div class="overflow-hidden border rounded-lg dark:border-neutral-700">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                                <thead class="bg-gray-50 dark:bg-neutral-700">
                                                    <tr>
                                                        <th
                                                            scope="col"
                                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400"
                                                        >
                                                            Book</th>
                                                        <th
                                                            scope="col"
                                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400"
                                                        >
                                                            Index</th>
                                                        <th
                                                            scope="col"
                                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-400"
                                                        >
                                                            Definition</th>
                                                        <th
                                                            scope="col"
                                                            class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-400"
                                                        >
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                    <tr
                                                        v-for="line in lines"
                                                        :key="line.id"
                                                    >
                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                            {{ books[line.book_id - 1].slug }} - {{ books[line.book_id
                                                                - 1].version
                                                            }}</td>
                                                        <td
                                                            class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                            {{ line.index_no }}</td>
                                                        <td
                                                            class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                            {{ line.definition }}</td>
                                                        <td
                                                            class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                            <Link
                                                                :href="route('lines.show', { line: line.id })"
                                                                type="button"
                                                                class="inline-flex items-center text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-2 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400"
                                                            >
                                                            Show</Link>
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
                    <!-- End Section for Lines -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Card Section -->
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { PropType } from 'vue';
import { Word, Line, Book } from '@/types/models';
import SectionTitle from '@/Components/SectionTitle.vue';



const props = defineProps({
    word: {
        type: Object as PropType<Word>,
        default: () => { }
    },
    lines: {
        type: Array as PropType<Line[]>,
        default: () => []
    },
    books: {
        type: Array as PropType<Book[]>,
        default: () => []
    }
});
</script>
