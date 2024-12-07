<template>

    <Head title="Book: E" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                        Book: E
                    </h2>
                    <div class="flex ml-4">
                        <!-- <Link :href="route('books.show', { book: prevItem })"> -->
                        <SquareChevronLeft
                            :size="28"
                            :stroke-width="1"
                            class="dark:text-white/75 dark:hover:text-white active:bg-yellow-900"
                        />
                        <!-- </Link> -->
                        <!-- <Link :href="route('books.show', { book: nextItem })"> -->
                        <SquareChevronRight
                            :size="28"
                            :stroke-width="1"
                            class="dark:text-white/75 dark:hover:text-white active:bg-yellow-900"
                        />
                        <!-- </Link> -->
                    </div>

                </div>

                <div>
                    <Link
                        :href="route('books.index')"
                        type="button"
                        class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                    >
                    <ArrowLeft :size="16" />back to List
                    </Link>
                </div>

            </div>

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
                                <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                    Id
                                </h2>
                            </div>
                            <div class="sm:col-span-9">
                                <p
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    {{ props.book?.data.id }}</p>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                    Title
                                </h2>
                            </div>
                            <div class="sm:col-span-9">
                                <p
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    {{ book?.data.title }}</p>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                    Version
                                </h2>
                            </div>
                            <div class="sm:col-span-9">
                                <p
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    {{ book?.data.version }}</p>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                    Slug
                                </h2>
                            </div>
                            <div class="sm:col-span-9">
                                <p
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    {{ book?.data.slug }}</p>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                    Publisher
                                </h2>
                            </div>
                            <div class="sm:col-span-9">
                                <p
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    {{ book?.data.publisher }}</p>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                    Year
                                </h2>
                            </div>
                            <div class="sm:col-span-9">
                                <p
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    {{ book?.data.published_at }}</p>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <h2
                                    for="book-select"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Items Count
                                </h2>
                            </div>
                            <div class="sm:col-span-9">
                                <p
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    {{ book?.data.max_index }}</p>
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
import { Head, Link, usePage } from '@inertiajs/vue3';
import { FlashMessage, Book } from '@/types/models';
import { computed, PropType } from 'vue';
import SectionTitle from '@/Components/SectionTitle.vue';
import { ArrowLeft, Edit, SquareChevronLeft, SquareChevronRight } from 'lucide-vue-next';

const props = defineProps({
    book: {
        type: Object as PropType<{ data: Book }>,
    }
});
</script>

<style scoped></style>
