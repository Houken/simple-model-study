<template>
    <AuthenticatedLayout>
        <div>Some headers</div>
        <div class="flex place-content-center">
            <div class="px-4 bg-white rounded-xl w-full max-w-[960px]">
                <div id="book-info">
                    <InfoSection title="Book info">
                        <LabelAndData
                            label="Book"
                            :dataToView="props.line?.data.book.title + ' 第' + props.line?.data.book.version + '版'"
                        ></LabelAndData>
                    </InfoSection>
                </div>
                <div id="book-info">
                    <InfoSection title="Word info">
                        <LabelAndData
                            label="English"
                            :dataToView="props.line?.data.word.english"
                        ></LabelAndData>
                        <LabelAndData
                            label="Part of speech"
                            :dataToView="props.line?.data.word.part_of_speech"
                        ></LabelAndData>
                    </InfoSection>
                </div>
                <div id="line-info">
                    <InfoSection title="Line info">
                        <LabelAndData
                            label="Index"
                            :dataToView="String(props.line?.data.index_no)"
                        ></LabelAndData>
                        <LabelAndData
                            label="Definition"
                            :dataToView="props.line?.data.definition"
                        ></LabelAndData>
                    </InfoSection>
                </div>
                <!-- Section -->
                <div
                    class="grid gap-2 py-8 mb-4 border-t-0 border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                    <SectionTitle title="Usages" />
                    <!-- End Col -->

                    <div
                        v-for="(usage, index) in props.line?.data.usages"
                        :key="index"
                        class="grid grid-cols-12 gap-2 sm:col-span-12"
                    >
                        <div class="sm:col-span-3">
                            <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
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
                            <h2 class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
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

    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import ExampleDecode from '@/Components/ExampleDecode.vue';
import InfoSection from '@/Components/InfoSection.vue';
import LabelAndData from '@/Components/LabelAndData.vue';
import SectionTitle from '@/Components/SectionTitle.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Line } from '@/types/models';
import { PropType } from 'vue';

const props = defineProps({
    line: {
        type: Object as PropType<{ data: Line }>
    },
    nextLineExists: {
        type: Boolean as PropType<boolean>
    },
});
</script>

<style scoped></style>
script
