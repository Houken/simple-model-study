<template>

    <Head title="Line: Create" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Line: Create
            </h2>
        </template>

        <div class="py-4">
            <!-- Card Section -->
            <div class="max-w-4xl px-4 py-4 mx-auto lg:px-8">
                <!-- Card -->
                <div class="p-4 bg-white shadow rounded-xl dark:bg-neutral-900">
                    <form @submit.prevent="form.post(route('lines.store'))">
                        <!-- Book info Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <!-- Book info title column -->
                            <div class="sm:col-span-12">
                                <SectionTitle
                                    title="Book info."
                                    class="rounded-t-lg"
                                />
                            </div>
                            <!-- End Book info title Col -->

                            <!-- Book info Label Column -->
                            <div class="sm:col-span-3">
                                <label
                                    for="book-select"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Book
                                </label>
                            </div>
                            <!-- End Book info Label Col -->

                            <!-- Book info Select Column -->
                            <div class="sm:col-span-9">
                                <select
                                    v-model="form.book_id"
                                    placeholder="単語集を選択"
                                    id="book-select"
                                    class="block px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm w-[24rem] pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                                    <option
                                        disabled
                                        value=0
                                    >単語集を選択</option>
                                    <option
                                        v-for="book in books"
                                        :value="book.id"
                                        :key="book.id"
                                    >{{ book.title }} 第{{
                                        book.version }}版</option>
                                </select>
                            </div>
                            <!-- End Book info Select Col -->
                        </div>
                        <!-- End Book info Section -->

                        <!-- Word Section -->
                        <div
                            class="grid gap-2 py-4 border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <!-- Word Section Title Column -->
                            <div class="sm:col-span-12">
                                <SectionTitle title="Word">
                                    <button
                                        :disabled="creatingNewWord"
                                        @click="creatingNewWord = true;"
                                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    >
                                        <Plus :size="16" />New Word
                                    </button>
                                </SectionTitle>
                            </div>
                            <!-- End Word Section Title Col -->

                            <!-- Create New Word Section -->
                            <transition
                                enter-active-class="duration-1000 ease-out"
                                enter-class="scale-y-0 -translate-y-full opacity-0"
                                enter-to-class="translate-y-0 opacity-100 scale-y-full"
                                leave-active-class="duration-200 ease-in"
                                leave-class="translate-y-0 opacity-100 scale-y-full"
                                leave-to-class="scale-y-0 -translate-y-full opacity-0"
                            >
                                <div
                                    v-show="creatingNewWord"
                                    class="grid grid-cols-12 gap-2 py-4 -mx-4 -mt-4 shadow-inner shadow-slate-400 dark:shadow-slate-900 px-7 sm:col-span-12 bg-slate-300 dark:bg-slate-800"
                                >
                                    <!-- New Word Label Column -->
                                    <div class="sm:col-span-3">
                                        <label
                                            for="word-new-english"
                                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                        >
                                            New Word
                                        </label>
                                    </div>
                                    <!-- End New Word Label Col -->

                                    <!-- New Word Input Column -->
                                    <div class="sm:col-span-6">
                                        <input
                                            v-model="newEnglish"
                                            id="word-new-english"
                                            type="text"
                                            class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        >
                                    </div>
                                    <!-- End New Word Input Col -->

                                    <!-- New Word Insertion Column -->
                                    <div class="inline-flex sm:col-span-3 gap-x-2">
                                        <button
                                            @click="insertSpecialChar('word-new-english', '〜')"
                                            type="button"
                                            class="py-3 font-bold px-4 flex justify-center items-center size-[34px] text-xs rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        >〜
                                        </button>
                                        <button
                                            @click="insertSpecialChar('word-new-english', '…')"
                                            type="button"
                                            class="py-3 px-4 flex justify-center items-center size-[34px] text-xs font-bold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        >…
                                        </button>
                                    </div>

                                    <!-- End New Word Insertion Col -->

                                    <!-- New Word POS Label Column -->
                                    <div class="sm:col-span-3">
                                        <label
                                            for="word-part-of-speech"
                                            class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                        >
                                            Part of Speech
                                        </label>
                                    </div>
                                    <!-- End New Word POS Label Col -->

                                    <!-- New Word POS Input Column -->
                                    <div class="sm:col-span-9">
                                        <input
                                            v-model="newPartOfSpeech"
                                            list="part_of_speech_list"
                                            id="word-part-of-speech"
                                            type="text"
                                            class="block w-[12rem] px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        >
                                        <datalist id="part_of_speech_list">
                                            <option v-for="pos in listOfPoses">{{ pos }}</option>
                                        </datalist>
                                    </div>
                                    <!-- End New Word POS Input Col -->

                                    <!-- New Word Buttons Column -->
                                    <div class="flex justify-end sm:col-span-12 gap-x-2">
                                        <button
                                            @click="cancelCreateNewWord"
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-yellow-800 bg-yellow-100 border border-transparent rounded-lg gap-x-2 hover:bg-yellow-200 focus:outline-none focus:bg-yellow-200 disabled:opacity-50 disabled:pointer-events-none dark:text-yellow-500 dark:bg-yellow-800/30 dark:hover:bg-yellow-800/20 dark:focus:bg-yellow-800/20"
                                        >
                                            <CircleX :size="18" />Cancel
                                        </button>
                                        <button
                                            @click="storeNewWord"
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-red-800 bg-red-100 border border-transparent rounded-lg gap-x-2 hover:bg-red-200 focus:outline-none focus:bg-red-200 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:bg-red-800/30 dark:hover:bg-red-800/20 dark:focus:bg-red-800/20"
                                        >
                                            <Database :size="18" />Store New Word
                                        </button>
                                    </div>
                                    <!-- End New Word Buttons Col -->
                                </div>
                            </transition>

                            <!-- Word English Label Column -->
                            <div class="sm:col-span-3">
                                <h2
                                    for="word-english"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    English
                                </h2>
                            </div>
                            <!-- End Word English Label Col -->

                            <!-- Word Selected Word Column -->
                            <div class="sm:col-span-9">
                                <p
                                    id="word-selected-english"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                                    {{ selectedWord ?? "単語を選択" }}</p>
                                <input
                                    id="word-english"
                                    type="text"
                                    class="hidden"
                                    v-model="form.word_id"
                                >
                            </div>
                            <!-- End Word Selected Word Col -->

                            <!-- Word Filter Word Column -->
                            <div class="sm:col-span-9 sm:col-start-4">
                                <input
                                    v-model="wordFilter"
                                    id="word-filter"
                                    type="text"
                                    placeholder="単語を絞り込み"
                                    class="block w-[16rem] px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                            </div>
                            <!-- End Word Filter Word Col -->

                            <!-- Word Picker Column -->
                            <div
                                class="sm:col-span-9 sm:col-start-4"
                                v-if="showWordPicker"
                                id="word-picker"
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
                            <!-- End Word Picker Col -->
                        </div>
                        <!-- End Word Section -->

                        <!-- Line Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <!-- Line Section Title -->
                            <div class="sm:col-span-12">
                                <SectionTitle title="Line info." />
                            </div>
                            <!-- End Line Section Title Col -->

                            <!-- Line Index No. Label Column -->
                            <div class="sm:col-span-3">
                                <label
                                    for="line-index-no"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Index No.
                                </label>
                            </div>
                            <!-- End Line Index No. Col -->

                            <!-- Line Index No. Input Column -->
                            <div class="sm:col-span-9">
                                <input
                                    v-model.number="form.index_no"
                                    id="line-index-no"
                                    type="number"
                                    :class="[
                                        'block w-[8rem] px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm text-end',
                                        'focus:border-blue-500 focus:ring-blue-500',
                                        'disabled:opacity-50 disabled:pointer-events-none',
                                        'dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600',
                                        { 'text-white dark:text-neutral-900': form.index_no === 0 },
                                        { 'text-black': form.index_no !== 0 }
                                    ]"
                                >
                            </div>
                            <!-- End Line Index No. Input Col -->

                            <!-- Line Definition Label Column -->
                            <div class="sm:col-span-3">
                                <label
                                    for="line-definition"
                                    class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                >
                                    Definition
                                </label>
                            </div>
                            <!-- End Line Definition Label Col -->

                            <!-- Line Definition Input Column -->
                            <div class="sm:col-span-9">
                                <input
                                    v-model="form.definition"
                                    id="line-definition"
                                    type="text"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                >
                            </div>
                            <!-- End Line Definition Input Col -->
                        </div>
                        <!-- End Line Section -->

                        <!-- Usages Section -->
                        <div
                            class="grid gap-2 py-8 border-t border-gray-200 sm:grid-cols-12 sm:gap-4 first:pt-0 last:pb-0 first:border-transparent dark:border-neutral-700 dark:first:border-transparent">
                            <!-- Usages Section Title Column -->
                            <div class="sm:col-span-12">
                                <SectionTitle title="Usages" />
                            </div>
                            <!-- End Usages Section Title Col -->

                            <!-- Usages Details Col -->
                            <div
                                v-for="(usage, index) in form.usages"
                                class="grid grid-cols-12 gap-2 sm:col-span-12"
                            >
                                <!-- Usages Example 1 Label Column -->
                                <div class="sm:col-span-3">
                                    <label
                                        :for="'usage-example-' + (index + 1)"
                                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                    >
                                        Example {{ index + 1 }}
                                    </label>
                                </div>
                                <!-- End Usages Example 1 Label Col -->

                                <!-- Usages Example 1 Input Column -->
                                <div class="sm:col-span-7">
                                    <input
                                        v-model="usage.example"
                                        :id="'usage-example-' + (index + 1)"
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                </div>
                                <!-- End Usages Example 1 Input Col -->

                                <!-- Usages Example 1 Quotes Column -->
                                <div class="inline-flex sm:col-span-2 gap-x-2">
                                    <EncloseInQuotes
                                        :element-id="`usage-example-${index + 1}`"
                                        quote="*"
                                        base-color="teal"
                                    />
                                    <EncloseInQuotes
                                        :element-id="`usage-example-${index + 1}`"
                                        quote="`"
                                        base-color="blue"
                                    />
                                </div>
                                <!-- End Usages Example 1 Quotes Col -->

                                <!-- Usages Translation 1 Label Column -->
                                <div class="sm:col-span-3">
                                    <label
                                        :for="'usage-translation-' + (index + 1)"
                                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500"
                                    >
                                        Translation {{ index + 1 }}
                                    </label>
                                </div>
                                <!-- End Usages Translation 1 Label Col -->

                                <!-- Usages Translation 1 Inout Column -->
                                <div class="sm:col-span-7">
                                    <input
                                        v-model="usage.translation"
                                        :id="'usage-translation-' + (index + 1)"
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                </div>
                                <!-- End Usages Translation 1 Inout Col -->

                                <!-- Usages Example 1 Quotes Column -->
                                <div class="inline-flex sm:col-span-2 gap-x-2">
                                    <EncloseInQuotes
                                        :element-id="`usage-translation-${index + 1}`"
                                        quote="*"
                                    />
                                    <EncloseInQuotes
                                        :element-id="`usage-translation-${index + 1}`"
                                        quote="`"
                                    />
                                </div>
                                <!-- End Usages Example 1 Quotes Col -->
                            </div>
                            <!-- End Usages Details Col -->


                            <!-- Usages Add Usage Column -->
                            <div class="pb-2 sm:col-start-4 sm:col-span-8">
                                <button
                                    @click="handleUsage"
                                    :disabled="!isValidUsage"
                                    type="button"
                                    class="inline-flex items-center text-xs font-medium text-blue-600 gap-x-1 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500 disabled:text-slate-600 disabled:hover:no-underline"
                                    href="../docs/index.html"
                                >
                                    <CirclePlus :size="16" />
                                    Add Usage
                                </button>
                            </div>
                            <!-- End Usages Add Usage Col  -->
                        </div>
                        <!-- End Usages Section -->

                        <!-- Store Line Section -->
                        <div
                            class="flex justify-end p-4 -m-4 rounded-b-lg sm:col-span-12 gap-x-2 dark:bg-slate-800 bg-slate-200">
                            <button
                                @click="backToPrevious"
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
                                Store New Line
                            </button>
                        </div>
                        <!-- End Store Line Section -->
                    </form>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Card Section -->
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import SectionTitle from '@/Components/SectionTitle.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Book, Word, Usage } from '@/types/models';
import { encloseSentencesInQuotes, insertSpecialChar } from '@/Utils/InputUtils';
import { Head, router, useForm } from '@inertiajs/vue3';
import { CirclePlus, CircleX, Database, Plus } from 'lucide-vue-next';
import { computed, nextTick, onMounted, PropType, ref, watch } from 'vue';
import { ParameterValue } from '../../../../vendor/tightenco/ziggy/src/js';
import EncloseInQuotes from '@/Components/EncloseInQuotes.vue';

// Variables --------
// --- Props
const props = defineProps({
    books: {
        type: Array as PropType<Book[]>,
        default: () => [],
    },
    listOfPoses: {
        type: Array,
    },
    words: {
        type: Array as PropType<Word[]>,
        default: () => [],
    },
    nextBookId: {
        type: Number,
    },
    nextIndexNo: {
        type: Number,
    },
    previousRouteAndParams: {
        type: Object,
    },
    newWordId: {
        type: Number,
    },
});

// --- usagesの準備
// const defaultUsages = ref<Usage[]>([
//     { example: '', translation: '' },
// ]);

// --- Form
const form = useForm({
    book_id: props.nextBookId,
    word_id: props.newWordId || 0,
    index_no: props.nextIndexNo,
    definition: '',
    usages: [] as Usage[],
})

// Focus Control
onMounted(() => {
    if (props.previousRouteAndParams?.previousRoute === 'lines.show') {
        creatingNewWord.value = true;
        nextTick(() => {
            document.getElementById('word-new-english')?.focus();
        });
    }
});

// Create New Word --------
// --- Initialize
const creatingNewWord = ref(false);

let newEnglish = ref("");
let newPartOfSpeech = ref("");

// --- Cancel Button
const cancelCreateNewWord = () => {
    creatingNewWord.value = false;
    newEnglish.value = '';
    newPartOfSpeech.value = '';
}

// --- Store New Word Button
const storeNewWord = async () => {

    let dataToStore = {
        english: newEnglish.value,
        part_of_speech: newPartOfSpeech.value,
        nextBookId: props.nextBookId,
        nextIndexNo: props.nextIndexNo,
    };

    router.put(route('word.storeFromLine'), dataToStore);

    creatingNewWord.value = false;
    newEnglish.value = '';
    newPartOfSpeech.value = '';
}

// Word Id --------
// --- Selected Word

// --- Word Filter
let wordFilter = ref('');

// --- --- Word Pickerの表示/非表示
let showWordPicker = ref(false);

watch(() => wordFilter.value, (newValue) => {
    if (newValue && newValue.trim() !== '') {
        showWordPicker.value = true;
    } else {
        showWordPicker.value = false;
    }
});

watch(() => form.word_id, (newValue) => {
    if (newValue > 0) {
        showWordPicker.value = false;
    }
});

// --- --- wordsの絞り込み処理
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

// --- --- wordの選択と表示
const selectThisWord = (id: number | undefined) => {
    if (id) {
        form.word_id = id;
    }
}

let selectedWord = computed(() => {
    if (form.word_id > 0) {
        let theEnglish = props.words.find(word => word.id === form.word_id)?.english;
        return theEnglish;
    }
})

// Usagesの処理
// --- Add Usageの表示/非表示
const isValidUsage = computed(() => {
    let usagesLength = form.usages.length;
    if (usagesLength === 0) {
        return true
    } else {
        return form.usages.length > 0 && !!form.usages[form.usages.length - 1]?.example && !!form.usages[form.usages.length - 1]?.translation;
    }
});
// --- Usageフォームの追加処理
const handleUsage = () => {
    const newUsageIndex = form.usages.push({ example: "", translation: "" });
    const lastExampleId = `usage-example-${newUsageIndex}`;
    nextTick(() => {
        document.getElementById(lastExampleId)?.focus();
    });
};

// Cancelボタンの処理
const backToPrevious = () => {
    let previousRoute = props.previousRouteAndParams?.previousRoute;
    let previousParams = props.previousRouteAndParams?.previousParams as ParameterValue;
    // console.log(previousParams);
    router.visit(route(previousRoute, previousParams));
}
</script>
