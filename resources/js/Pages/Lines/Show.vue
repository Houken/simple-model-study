<template>

    <Head title="Line: Show" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <!-- Page Title -->
                    <h2 class="text-sm font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        Line: Show
                    </h2>
                    <!-- Prev or Next Buttons -->
                    <div class="flex ml-4">
                        <div v-if="!prevItem">
                            <SquareChevronLeft
                                :size="24"
                                :stroke-width="1"
                                class="dark:text-white/75 opacity-20 dark:hover:text-white active:bg-yellow-900"
                            />
                        </div>
                        <Link
                            :href="route('lines.show', { line: prevItem })"
                            v-if="prevItem"
                        >
                        <SquareChevronLeft
                            :size="24"
                            :stroke-width="1"
                            class="dark:text-white/75 dark:hover:text-white active:bg-yellow-900"
                        />
                        </Link>
                        <Link
                            :href="route('lines.show', { line: nextItem })"
                            v-if="props.nextLineExists"
                        >
                        <SquareChevronRight
                            :size="24"
                            :stroke-width="1"
                            class="dark:text-white/75 dark:hover:text-white active:bg-yellow-900"
                        />
                        </Link>
                        <div v-if="!props.nextLineExists">
                            <SquareChevronRight
                                :size="24"
                                :stroke-width="1"
                                class="dark:text-white/75 opacity-10 dark:hover:text-white active:bg-yellow-900"
                            />
                        </div>
                    </div>

                </div>
                <!-- Create Next or Edit or Back To List buttons -->
                <div class="flex items-center justify-between">
                    <div
                        v-if="!props.nextLineExists"
                        class="me-6"
                    >
                        <button
                            type="button"
                            @click="createNext()"
                            class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-teal-500 border border-transparent rounded-lg outline outline-teal-500 outline-1 outline-offset-1 gap-x-1 hover:bg-teal-600 focus:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none"
                        >
                            <CirclePlus :size="16" />Create Next
                        </button>
                    </div>

                    <div class="inline-flex">
                        <Link
                            type="button"
                            :href="route('lines.edit', { line: line?.data.id })"
                            class="inline-flex items-center px-2 py-1 mr-1 text-xs font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        >
                        <Edit :size="10" />Edit
                        </Link>
                        <button
                            type="button"
                            class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        >
                            <ArrowLeft :size="14" />back to List
                        </button>
                    </div>
                </div>


            </div>

        </template>
        <div class="py-4">
            <!-- <div v-if="$page.props.flash.message">
                <p class="p-2 bg-blue-100">{{ $page.props.flash.message }}</p>
            </div> -->
            <!-- Card Section -->
            <div class="max-w-4xl px-4 py-4 mx-auto lg:py-4">
                <!-- Card -->
                <div class="p-4 bg-white shadow rounded-xl dark:bg-slate-800">
                    <div>
                        <!-- Section -->
                        <div
                            class="grid gap-2 py-4 border-t-0 border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
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
                            class="grid gap-2 py-4 border-t-0 border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
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

                            <div class="sm:col-span-3">
                                <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                    Part of Speech
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <p
                                    id="word-selected"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-700 dark:border-neutral-800 dark:text-neutral-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                                    {{ props.line?.data.word.part_of_speech }}</p>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div
                            class="grid gap-2 py-4 border-t-0 border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
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
                            class="grid gap-2 py-8 border-t-0 border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
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
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import { FlashMessage, Line, Word } from '@/types/models';
import { computed, PropType } from 'vue';
import ExampleDecode from '@/Components/ExampleDecode.vue';
import SectionTitle from '@/Components/SectionTitle.vue';
import { ArrowLeft, Edit, SquareChevronLeft, SquareChevronRight, CirclePlus } from 'lucide-vue-next';

const page = usePage();
const props = defineProps({
    line: {
        type: Object as PropType<{ data: Line }>,
    },
    nextLineExists: {
        type: Boolean
    },
});

const prevItem = computed(() => {
    if (props.line?.data.id && props.line?.data.id > 1) {
        return props.line?.data.id - 1;
    } else {
        return false;
    }
});
const nextItem = computed(() => {
    if (props.line?.data.id) {
        return props.line?.data.id + 1;
    }
});

const createNext = () => {
    let nextBookId = props.line?.data.book.id;
    let nextIndexNo = (props.line?.data.index_no || 0) + 1;
    // console.log(nextBookId, nextIndexNo);
    return router.get(route('lines.create'), {
        nextBookId: nextBookId,
        nextIndexNo: nextIndexNo,
    })
}
</script>

<style scoped></style>
