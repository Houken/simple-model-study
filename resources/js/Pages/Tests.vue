<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Tests" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Tests
            </h2>
        </template>

        <div class="py-0">
            <!-- Card Section -->
            <div class="max-w-4xl px-4 py-8 mx-auto sm:px-6 lg:px-8"><!-- Card -->
                <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-neutral-800">
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                            Profile
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            Manage your name, password and account settings.
                        </p>
                    </div>

                    <form>
                        <!-- Grid -->
                        <div class="grid gap-2 sm:grid-cols-12 sm:gap-6">
                            <div class="sm:col-span-3">
                                <label class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    Profile photo
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <div class="flex items-center gap-5">
                                    <img
                                        class="inline-block rounded-full size-16 ring-2 ring-white dark:ring-neutral-900"
                                        src="https://preline.co/assets/img/160x160/img1.jpg"
                                        alt="Avatar"
                                    >
                                    <div class="flex gap-x-2">
                                        <div>
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                            >
                                                <svg
                                                    class="shrink-0 size-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                    <polyline points="17 8 12 3 7 8" />
                                                    <line
                                                        x1="12"
                                                        x2="12"
                                                        y1="3"
                                                        y2="15"
                                                    />
                                                </svg>
                                                Upload photo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <label
                                    for="af-account-full-name"
                                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                                >
                                    Full name
                                </label>
                                <div class="inline-block hs-tooltip">
                                    <svg
                                        class="inline-block text-gray-400 hs-tooltip-toggle ms-1 size-3 dark:text-neutral-600"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                                        />
                                    </svg>
                                    <span
                                        class="absolute z-10 invisible inline-block w-40 px-2 py-1 text-xs font-medium text-center text-white transition-opacity bg-gray-900 rounded shadow-sm opacity-0 hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible dark:bg-neutral-700"
                                        role="tooltip"
                                    >
                                        Displayed on public forums, such as Preline
                                    </span>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <div class="sm:flex">
                                    <input
                                        id="af-account-full-name"
                                        type="text"
                                        class="relative block w-full px-3 py-2 -mt-px text-sm border-gray-200 shadow-sm pe-11 -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Maria"
                                    >
                                    <input
                                        type="text"
                                        class="relative block w-full px-3 py-2 -mt-px text-sm border-gray-200 shadow-sm pe-11 -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Boone"
                                    >
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <label
                                    for="af-account-email"
                                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                                >
                                    Email
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <input
                                    id="af-account-email"
                                    type="email"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="maria@site.com"
                                >
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <label
                                    for="af-account-password"
                                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                                >
                                    Password
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <div class="space-y-2">
                                    <input
                                        id="af-account-password"
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Enter current password"
                                    >
                                    <input
                                        type="text"
                                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg shadow-sm pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Enter new password"
                                    >
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <div class="inline-block">
                                    <label
                                        for="af-account-phone"
                                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                                    >
                                        Phone
                                    </label>
                                    <span class="text-sm text-gray-400 dark:text-neutral-600">
                                        (Optional)
                                    </span>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <div class="sm:flex">
                                    <input
                                        id="af-account-phone"
                                        type="text"
                                        class="relative block w-full px-3 py-2 -mt-px text-sm border-gray-200 shadow-sm pe-11 -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="+x(xxx)xxx-xx-xx"
                                    >
                                    <select
                                        class="relative block w-full px-3 py-2 -mt-px text-sm border-gray-200 shadow-sm pe-9 sm:w-auto -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                        <option selected>Mobile</option>
                                        <option>Home</option>
                                        <option>Work</option>
                                        <option>Fax</option>
                                    </select>
                                </div>

                                <p class="mt-3">
                                    <a
                                        class="inline-flex items-center text-sm font-medium text-blue-600 gap-x-1 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500"
                                        href="../docs/index.html"
                                    >
                                        <svg
                                            class="shrink-0 size-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="10"
                                            />
                                            <path d="M8 12h8" />
                                            <path d="M12 8v8" />
                                        </svg>
                                        Add phone
                                    </a>
                                </p>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <label
                                    for="af-account-gender-checkbox"
                                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                                >
                                    Gender
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <div class="sm:flex">
                                    <label
                                        for="af-account-gender-checkbox"
                                        class="relative flex w-full px-3 py-2 -mt-px text-sm border border-gray-200 shadow-sm -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                        <input
                                            type="radio"
                                            name="af-account-gender-checkbox"
                                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="af-account-gender-checkbox"
                                            checked
                                        >
                                        <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Male</span>
                                    </label>

                                    <label
                                        for="af-account-gender-checkbox-female"
                                        class="relative flex w-full px-3 py-2 -mt-px text-sm border border-gray-200 shadow-sm -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                        <input
                                            type="radio"
                                            name="af-account-gender-checkbox"
                                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="af-account-gender-checkbox-female"
                                        >
                                        <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Female</span>
                                    </label>

                                    <label
                                        for="af-account-gender-checkbox-other"
                                        class="relative flex w-full px-3 py-2 -mt-px text-sm border border-gray-200 shadow-sm -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    >
                                        <input
                                            type="radio"
                                            name="af-account-gender-checkbox"
                                            class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-500 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="af-account-gender-checkbox-other"
                                        >
                                        <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">Other</span>
                                    </label>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <label
                                    for="af-account-bio"
                                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                                >
                                    BIO
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <textarea
                                    id="af-account-bio"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    rows="6"
                                    placeholder="Type your message..."
                                ></textarea>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Grid -->

                        <div class="flex justify-end mt-5 gap-x-2">
                            <button
                                type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                            >
                                Cancel
                            </button>
                            <button
                                type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            >
                                Save changes
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
