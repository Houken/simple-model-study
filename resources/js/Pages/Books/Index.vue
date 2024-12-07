<template>

    <Head title="Book: INDEX" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold leading-tight text-gray-800 text-md dark:text-gray-200">
                Book: INDEX
            </h2>
        </template>

        <div class="py-4">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                        <thead>
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="w-[4rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    id</th>
                                                <th
                                                    scope="col"
                                                    class="w-[16rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    title</th>
                                                <th
                                                    scope="col"
                                                    class="w-[4rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-center dark:text-neutral-500"
                                                >
                                                    version</th>
                                                <th
                                                    scope="col"
                                                    class="w-[16rem] px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    slug</th>
                                                <th
                                                    scope="col"
                                                    class="px-6 py-2 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500"
                                                >
                                                    publisher</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            <tr
                                                v-for="book in books.data"
                                                :key="book.id"
                                                class="hover:bg-gray-100 dark:hover:bg-neutral-700"
                                            >
                                                <td
                                                    class="relative px-6 py-2 text-sm font-medium text-center text-gray-800 whitespace-nowrap dark:text-neutral-200 hover:bg-slate-200 hover:text-gray-900">
                                                    <Link
                                                        :href="route('books.show', { book: book.id })"
                                                        class="absolute inset-0 pt-2"
                                                    >{{ book.id }}
                                                    </Link>
                                                </td>
                                                <td
                                                    class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ book.title }}</td>
                                                <td
                                                    class="px-6 py-2 text-sm text-center text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ book.version }}</td>
                                                <td
                                                    class="px-6 py-2 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                                    {{ book.slug }}</td>
                                                <td
                                                    class="px-6 py-2 text-sm font-medium whitespace-nowrap text-start dark:text-neutral-200">
                                                    {{ book.publisher }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { PropType } from 'vue';
import { Book } from '@/types/models';

const props = defineProps({
    books: {
        type: Object as PropType<{ data: Book[] }>,
        default: () => ({ data: [] }),
    },
});
</script>
