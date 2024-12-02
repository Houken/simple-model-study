<template>

    <Head title="Line: Show" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Line: Show
            </h2>
        </template>
        <div class="py-4">
            <!-- Card Section -->
            <div class="max-w-4xl px-4 py-10 mx-auto sm:px-6 lg:px-8 lg:py-4">
                <!-- Card -->
                <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-800">
                    <div>
                        <!-- Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <SectionTitle
                                title="Book info."
                                class="rounded-t-lg"
                            />
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2
                                    for="book-select"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Book
                                </h2>
                            </div>
                            <div class="sm:col-span-9">
                                <p
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    {{ props.line?.data.book.title }} 第{{ props.line?.data.book.version }}版</p>
                            </div>
                            <!-- /.sm:col-span-9 -->
                            <!-- End Col -->
                        </div>

                        <!-- End Section -->

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
                                <p
                                    id="word-selected"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                                    {{ props.line?.data.word.english }}</p>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <SectionTitle title="Line info." />
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2
                                    for="line-index-no"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Index no.
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <p
                                    id="line-index-no"
                                    class="block text-end w-[6rem] px-4 py-2 text-sm border-gray-200 bg-slate-50 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-700 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                                    {{ props.line?.data.index_no }}</p>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2
                                    for="line-definition"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Definition
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <p
                                    id="line-definition"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-700 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                                    {{ props.line?.data.definition }}</p>

                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <SectionTitle title="Usages" />
                            <!-- End Col -->

                            <div
                                v-for="(usage, index) in props.line?.data.usages"
                                :key="index"
                                class="grid grid-cols-12 gap-2 sm:col-span-12"
                            >
                                <div class="sm:col-span-3">
                                    <h2
                                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                        Example {{ index + 1 }}
                                    </h2>
                                </div><!-- End Col -->
                                <div class="sm:col-span-9">
                                    <p
                                        :id="'usage-' + (index + 1)"
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-100 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                        <ExampleDecode :text="usage.example" />
                                    </p>
                                </div><!-- End Col -->
                                <div class="sm:col-span-3">
                                    <h2
                                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                        Translation {{ index + 1 }}
                                    </h2>
                                </div><!-- End Col -->
                                <div class="sm:col-span-9">
                                    <p
                                        :id="'usage-' + (index + 1)"
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-100 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                        <ExampleDecode :text="usage.translation" />
                                    </p>
                                </div><!-- End Col -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Card Section -->
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Line } from '@/types/models';
import { PropType } from 'vue';
import ExampleDecode from '@/Components/ExampleDecode.vue';
import SectionTitle from '@/Components/SectionTitle.vue';

const props = defineProps({
    line: {
        type: Object as PropType<{ data: Line }>,
    }
});
</script>

<style scoped></style>
