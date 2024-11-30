<template>
    <div class="mx-auto max-w-7xl">
        <div class="mx-auto max-w-none">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    <div class="flex justify-between flex-1 sm:hidden" />
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-xs text-gray-700">
                                Showing
                                <!-- space -->
                                <span class="font-medium">{{ data.meta.from }}</span>
                                <!-- space -->
                                to
                                <!-- space -->
                                <span class="font-medium">{{ data.meta.to }}</span>
                                <!-- space -->
                                of
                                <!-- space -->
                                <span class="font-medium"> {{ data.meta.total }} </span>
                                <!-- space -->
                                results
                            </p>
                        </div>
                        <div>
                            <!-- Pagination -->
                            <nav
                                class="flex items-center -space-x-px"
                                aria-label="Pagination"
                            >
                                <button
                                    @click.prevent="updatedPageNumber(link)"
                                    v-for="(link, index) in data.meta.links"
                                    :disabled="link.active || !link.url"
                                    :key="index"
                                    type="button"
                                    class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-1.5 text-sm first:rounded-s-lg last:rounded-e-lg border border-gray-200 text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                    :class="{
                                        'z-10 bg-indigo-50 border-indigo-500 text-indigo-600': link.active,
                                        'bg-white border-gray-300 text-gray-500 hover:bg-gray-50': !link.active,
                                    }"
                                    aria-label="Previous"
                                >
                                    <span class="hidden sm:block"><span v-html="link.label"></span></span>
                                </button>
                            </nav>
                            <!-- End Pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { router, usePage } from '@inertiajs/vue3';

defineProps({
    data: {
        type: Object,
        required: true
    },
    updatedPageNumber: {
        type: Function,
        required: true,
    }
})

const updatePageNumber = (link) => {
    let pageNumber = link.url.split("=")[1];
    let urlBody = link.url.split("=")[0];
    router.visit(urlBody + "=" + pageNumber, {
        preserveScroll: true,
    });
}
</script>
