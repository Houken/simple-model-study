<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import TestSelectButton from '@/Components/TestSelectButton.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const selected = ref('One');

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <Head title="Welcome" />
    <div class="bg-neutral-500 p-4 h-screen">
        <div
            class="p-4 rounded-xl bg-gradient-to-b from-background-from to-background-to text-black/50 dark:bg-black dark:text-white/50 size-full">
            <ApplicationLogo />
            <div class="max-h-[468px] h-[80%] w-[35rem] p-[1.5rem] bg-white/30 rounded-[3rem] mx-auto mt-8">
                <div
                    class="relative p-4 max-h-[420px] h-minus-1rem w-[32rem] bg-white rounded-[2rem] z-0 mx-auto flex flex-col">
                    <div class="relative w-[32rem] p-0 font-sans mx-auto
                    before:content-[' '] before:absolute before:left-0 before:w-[30rem] before:h-[5rem] before:bg-[#ebedf0] before:rounded-[28px] before:z-[-1]
                    ">
                        <input
                            name="switch"
                            id="one"
                            type="radio"
                            class="peer/one"
                            value="One"
                            v-model="selected"
                            checked
                        />
                        <label
                            for="one"
                            class="inline-block hs-tooltip mt-[1.75rem] mr-[1rem] mb-0 ml-[3rem] w-[10rem] p-0 text-center cursor-pointer transition-colors duration-200 ease-in-out text-slate-600 hover:text-black dark:text-slate-400
                            peer-checked/one:font-bold dark:hover:text-slate-300 z-10 hover:font-bold"
                        >WORD
                            <span
                                class="hs-tooltip-content rounded-sm hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900/50 text-white"
                                role="tooltip"
                            >単語テスト</span></label>
                        <input
                            name="switch"
                            id="two"
                            type="radio"
                            class="peer/two"
                            value="Two"
                            v-model="selected"
                        />
                        <label
                            for="two"
                            class="inline-block hs-tooltip mt-[1.75rem] mr-[1rem] mb-0 ml-[3rem] w-[10rem] p-0 text-center cursor-pointer transition-colors duration-200 ease-in-out text-slate-600 hover:text-black dark:text-slate-400 hover:font-bold dark:hover:text-slate-300 z-10 peer-checked/two:font-bold"
                        >USAGE<span
                                class="hs-tooltip-content rounded-sm hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900/50 text-white"
                                role="tooltip"
                            >例文テスト</span></label>
                        <div class="switch__indicator" />
                    </div>
                    <div
                        v-show="selected === 'One'"
                        class="relative flex flex-col gap-y-4 mt-16 transition-all duration-200 ease-in-out"
                    >
                        <TestSelectButton
                            message="E to J"
                            tip="和訳問題"
                            bgColor="gray-200"
                            tip-placement="top"
                            test-route="test.word.ej"
                        />
                        <TestSelectButton
                            message="J to E"
                            tip="英訳問題"
                            bgColor="slate-200"
                            tip-placement="bottom"
                            test-route="test.word.ej"
                        />
                    </div>
                    <div
                        v-show="selected === 'Two'"
                        class="relative flex flex-col gap-y-4 mt-16 transition-all duration-200 ease-in-out"
                    >
                        <TestSelectButton
                            message="E to J"
                            tip="和訳問題"
                            bgColor="slate-200"
                            tip-placement="top"
                            test-route="test.usage.ej"
                        />
                        <TestSelectButton
                            message="re-Order"
                            tip="並べ替え問題"
                            bgColor="gray-200"
                            tip-placement="bottom"
                            test-route="test.usage.ej"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.switch__indicator {
    width: 15rem;
    height: 4rem;
    position: absolute;
    z-index: -1;
    top: 0.5rem;
    left: 0rem;
    background: blue;
    border-radius: 1.5rem;
    transition: transform 600ms cubic-bezier(0.02, 0.94, 0.09, 0.97),
        background 300ms cubic-bezier(0.17, 0.67, 0.14, 1.03);
    transform: translate3d(1rem, 0, 0);
}

input#one:checked~.switch__indicator {
    background: #f9fcff;
    transform: translate3d(0.5rem, 0, 0);
}

input#two:checked~.switch__indicator {
    background: #f9fffc;
    transform: translate3d(14.5rem, 0, 0);
}

input[type="radio"]:not(:checked),
input[type="radio"]:checked {
    display: none;
}
</style>
