<template>

    <Head title="Line: CREATE" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Line: CREATE
            </h2>
        </template>

        <div class="py-4">
            <!-- Card Section -->
            <div class="max-w-4xl px-4 py-10 mx-auto sm:px-6 lg:px-8 lg:py-4">
                <!-- Card -->
                <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-800">
                    <form @submit.prevent="form.post(route('lines.store'))">
                        <!-- Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <SectionTitle
                                title="Book info."
                                class="rounded-t-lg"
                            />
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <label
                                    for="book-select"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Book
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <div class="sm:flex">

                                    <select
                                        v-model="form.book_id"
                                        id="book-select"
                                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                        <option
                                            value=""
                                            disabled
                                        >単語集を選択</option>
                                        <option
                                            v-for="book in books"
                                            :key="book.id"
                                            :value="book.id"
                                        >{{ book.title }}</option>
                                    </select>
                                </div>
                                <div
                                    v-if="form.errors.book_id"
                                    class="font-bold text-red-400"
                                >{{ form.errors.book_id }}</div>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <SectionTitle title="Word info.">
                                <button
                                    @click="createNewWord()"
                                    type="button"
                                    class="inline-flex items-center px-3 py-2 text-xs font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                >
                                    <Plus :size="16" />New Word
                                </button>
                            </SectionTitle>
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
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-100 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                                    {{ selectedWord ??
                                        "単語を選択" }}</p>
                            </div>
                            <div class="hidden">
                                <input
                                    type="text"
                                    v-model="form.word_id"
                                />
                            </div>
                            <div
                                v-if="form.errors.word_id"
                                class="col-span-9 col-start-4 -mt-4 font-bold text-red-400"
                            >{{
                                form.errors.word_id
                            }}</div>
                            <!-- End Col -->

                            <div class="relative sm:col-start-4 sm:col-span-9">
                                <input
                                    v-model="wordFilter"
                                    id="word-select"
                                    type="text"
                                    placeholder="単語を絞り込み"
                                    class="block w-full py-2 text-sm border-gray-200 rounded-lg shadow-sm pl-[2.4rem] pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                                <Filter
                                    class="absolute top-[50%] -translate-y-[50%] left-2 dark:text-white"
                                    color="#606870"
                                />
                            </div>
                            <!-- End Col -->

                            <div
                                class="sm:col-span-9 sm:col-start-4"
                                v-if="wordFilter"
                            >
                                <div class="flex flex-col">
                                    <div class="-m-1.5 overflow-x-auto">
                                        <div class="p-1.5 min-w-full inline-block align-middle">
                                            <div
                                                class="overflow-hidden border rounded-lg shadow dark:border-neutral-700 dark:shadow-gray-900">
                                                <table
                                                    class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700"
                                                >
                                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                        <tr v-for="word in props.words">
                                                            <td
                                                                class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                                <button
                                                                    type="button"
                                                                    @click="selectThisWord(word.id)"
                                                                >{{
                                                                    word.id }}</button>
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                                {{ word.english }}</td>
                                                            <td
                                                                class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <label
                                    for="line-index-no"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Index no.
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <input
                                    v-model="form.index_no"
                                    id="line-index-no"
                                    type="number"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                            </div>
                            <div
                                v-if="form.errors.index_no"
                                class="col-span-9 col-start-4 -mt-4 font-bold text-red-400"
                            >{{
                                form.errors.index_no
                            }}</div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <label
                                    for="line-definition"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Definition
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <input
                                    v-model="form.definition"
                                    id="line-definition"
                                    type="text"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                            </div>
                            <div
                                v-if="form.errors.definition"
                                class="col-span-9 col-start-4 -mt-4 font-bold text-red-400"
                            >{{
                                form.errors.definition
                            }}</div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <SectionTitle title="Usages" />
                            <!-- End Col -->

                            <div
                                v-for="(usage, index) in form.usages"
                                :key="index"
                                class="grid grid-cols-12 gap-2 sm:col-span-12"
                            >
                                <div class="sm:col-span-3">
                                    <label
                                        :for="'usage-example-' + (index + 1)"
                                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                    >
                                        Example {{ index + 1 }}
                                    </label>
                                </div><!-- End Col -->
                                <div class="sm:col-span-9">
                                    <input
                                        :id="'usage-example-' + (index + 1)"
                                        v-model="usage.example"
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                </div><!-- End Col -->
                                <div class="sm:col-span-3">
                                    <label
                                        :for="'usage-translation-' + (index + 1)"
                                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                    >
                                        Translation {{ index + 1 }}
                                    </label>
                                </div><!-- End Col -->
                                <div class="sm:col-span-9">
                                    <input
                                        :id="'usage-translation-' + (index + 1)"
                                        v-model="usage.translation"
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                </div><!-- End Col -->
                            </div>
                            <div class="sm:col-span-3 sm:col-start-4">
                                <p class="">
                                    <button
                                        :disabled="!isValidUsage"
                                        type="button"
                                        @click="handleUsage"
                                        class="inline-flex items-center -mt-16 text-sm font-medium text-blue-600 disabled:text-slate-600 gap-x-1 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500"
                                    >
                                        <CirclePlus :size="16" />
                                        Add usage
                                    </button>
                                </p>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->


                        <div class="flex justify-end mt-5 gap-x-2">
                            <button
                                type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                            >
                                Cancel
                            </button>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            >
                                Save
                            </button>
                        </div>
                    </form>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Card Section -->
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, InertiaForm, Link, router, useForm, usePage } from '@inertiajs/vue3';
import { computed, nextTick, onMounted, PropType, ref, watch } from 'vue';
import { Book, Word, Usage } from '@/types/models';
import { CirclePlus, Filter, Plus } from 'lucide-vue-next';
import SectionTitle from '@/Components/SectionTitle.vue';
import { useRoute } from '../../../../vendor/tightenco/ziggy/src/js';


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
    nextBookId: {
        type: Number,
    },
    nextIndexNo: {
        type: Number,
    },
    newWordId: {
        type: Number,
        default: usePage().props.newWordId,
    },
});

const form: InertiaForm<{
    book_id?: number | string,
    word_id?: number,
    index_no?: number,
    definition: string,
    usages: Usage[],
}> = useForm('CreateLine', {
    book_id: props.nextBookId ? props.nextBookId : 0,
    word_id: props.newWordId ? props.newWordId : undefined,
    index_no: props.nextIndexNo ? props.nextIndexNo : 0,
    definition: '',
    usages: [] as Usage[],
});


let books = ref<Book[]>(props.books ?? []),
    book_id = ref(""),
    wordFilter = ref<string>((usePage().props.wordFilter as string) || ''),
    word_id = ref(""),
    pageNumber = ref<number>(1);

const isValidUsage = computed(() => {
    let usagesLength = form.usages.length;
    if (usagesLength === 0) { return true } else { return form.usages.length > 0 && !!form.usages[form.usages.length - 1]?.example && !!form.usages[form.usages.length - 1]?.translation; }

});

const handleUsage = () => {
    const newUsageIndex = form.usages.push({ example: "", translation: "" });
    const lastExampleId = `usage-example-${newUsageIndex}`;
    nextTick(() => { document.getElementById(lastExampleId)?.focus(); });

};

let wordsUrl = computed(() => {
    let url = new URL(route('lines.create'));
    if (wordFilter.value) {
        url.searchParams.append("wordFilter", wordFilter.value);
    }

    return url;
});

watch(
    () => wordsUrl.value, (updatedWordsUrl) => {
        router.visit(updatedWordsUrl, {
            preserveScroll: true,
            preserveState: true,
            replace: true,
        });
    }
);

const selectThisWord = (id: number | undefined) => {
    form.word_id = id;
}

let selectedWord = computed(() => {
    return props.words.find(word => word.id === form.word_id)?.english;
})

const createNewWord = () => {
    const currentPage = usePage();
    const currentPath = currentPage.url;
    console.log(currentPath);
    return router.get(route('words.create', { previousPage: currentPath }))
}

// このページがロードされたとき、フォームデータの復元をする
onMounted(() => {
    restoreFormData();
})

// セッションストレージから保存されたフォームデータを取得し、
// 内容があればその内容でフォームを初期化する。
// 内容がなければ初期化しない。
const restoreFormData = () => {
    const saveData = sessionStorage.getItem('lines_create_form_data');
    if (saveData) {
        const data = JSON.parse(saveData);
        form.reset(data);
    }
};

// フォームの内容に変更があれば、一時保存する
watch(form, (newValue) => {
    if (Object.keys(newValue).length > 0) {
        saveFormData();
    }
})

// フォームデータの一時保存処理
const saveFormData = () => {
    sessionStorage.setItem('lines_create_form_data', JSON.stringify(form));
}
</script>
