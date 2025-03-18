<template>

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
                id="createNewWord"
                v-show="creatingNewWord"
                class="grid grid-cols-12 gap-2 py-4 -mx-4 -mt-4 shadow-inner shadow-slate-400 dark:shadow-slate-900 px-7 sm:col-span-12 bg-slate-300 dark:bg-slate-700"
            >
                <!-- New Word Label Column -->
                <div class="sm:col-span-3">
                    <label
                        for="word-new-english"
                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-slate-500"
                    >
                        New Word
                    </label>
                </div>
                <!-- End New Word Label Col -->

                <!-- New Word Input Column -->
                <div class="sm:col-span-6">
                    <input
                        tabindex="1"
                        v-model="newEnglish"
                        id="word-new-english"
                        type="text"
                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-600 dark:border-neutral-700 dark:text-slate-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
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
                        class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-slate-500"
                    >
                        Part of Speech
                    </label>
                </div>
                <!-- End New Word POS Label Col -->

                <!-- New Word POS Input Column -->
                <div class="sm:col-span-9">
                    <input
                        tabindex="2"
                        v-model="newPartOfSpeech"
                        list="part_of_speech_list"
                        id="word-part-of-speech"
                        type="text"
                        class="block w-[12rem] px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-600 dark:border-neutral-700 dark:text-slate-300 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
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
                        tabindex="3"
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
            <div class="flex flex-row">
                <p
                    id="word-selected-english"
                    class="block w-2/3 px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm bg-slate-50 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                >
                    <PosAndWord
                        v-if="selectedWord?.english"
                        :word="selectedWord"
                    />
                    <span v-else>単語を新規入力または選択</span>
                </p>
            </div>

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
                tabindex="4"
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
                                id="word-picker-table"
                                class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700"
                            >
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    <tr v-for="word in props.words">
                                        <td
                                            class="w-[4rem] px-2 py-0 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                            <button
                                                class="px-3 py-2 m-0 rounded hover:bg-teal-100 hover:text-black"
                                                type="button"
                                                @click="selectThisWord(word.id)"
                                            >{{
                                                word.id }}</button>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                            <PosAndWord :word=word />
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
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
</template>

<script setup lang="ts">
import { Word } from '@/types/models';
import { insertSpecialChar } from '@/Utils/InputUtils';
import { useForm } from '@inertiajs/vue3';
import { computed, PropType, ref, watch } from 'vue';
import SectionTitle from './SectionTitle.vue';
import { CircleX, Database, Plus } from 'lucide-vue-next';
import PosAndWord from './PosAndWord.vue';

const props = defineProps({
    listOfPoses: {
        type: Array,
    },
    words: {
        type: Array as PropType<Word[]>,
        default: () => [],
    },
    newWord: {
        type: Object,
    },
})

const form = useForm({
    word_id: 0,
})

const creatingNewWord = ref(false);

let newEnglish = ref('');
let newPartOfSpeech = ref('');
let wordFilter = ref('');
let showWordPicker = ref(false);

watch(() => wordFilter.value, (newValue) => {
    // 単語絞り込み入力欄に値が入力された場合
    if (newValue && newValue.trim() !== '') {
        // 値が有効なら、単語ピッカーを表示
        showWordPicker.value = true;
    } else {
        // 無効な値なら、単語ピッカーを非表示
        showWordPicker.value = false;
    }
});

const cancelCreateNewWord = () => {
    creatingNewWord.value = false;
    newEnglish.value = '';
    newPartOfSpeech.value = '';
}

const emit = defineEmits(['update:modelValue', 'storeNewWord', 'selectThisWord']);

const storeNewWord = () => {
    emit('storeNewWord', {
        english: newEnglish.value,
        part_of_speech: newPartOfSpeech.value,
    });
}

let selectedWord = computed(() => {
    // form.word_idに有効な値があって、配列props.wordsに要素が存在する場合
    if (form.word_id > 0 && props.words.length > 0) {
        // form.word_idに該当するwordを取得
        let theWord = props.words.find(word => word.id === form.word_id);
        return theWord;
    } else if (props.newWord?.english !== '') {
        return { english: props.newWord?.english, part_of_speech: props.newWord?.part_of_speech };
    }
})

// 単語ピッカーで選択された単語をform.word_idにセット
const selectThisWord = (id: number | undefined) => {
    if (id) {
        // formのword_idを直接指定し、
        // フラグを下ろして新規word入力領域は閉じる
        form.word_id = id;
        creatingNewWord.value = false;
    }
}
</script>

<style scoped></style>
