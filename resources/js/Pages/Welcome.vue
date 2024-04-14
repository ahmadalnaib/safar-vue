<script setup>
import { Head,useForm } from "@inertiajs/vue3";
import { ref } from 'vue';



let today = new Date();
let formattedMonth = String(today.getMonth() + 1).padStart(2, '0');
let formattedDay = String(today.getDate()).padStart(2, '0');
let startDate = ref(`${today.getFullYear()}-${formattedMonth}-${formattedDay}`);




defineProps({
    categories: {
        type: Array,
    
    }
});


const form=useForm({
    address:'',
    start_date:'',
    end_date:'',
    categories:'',
})

const callApi = () => {

}


</script>

<template>
    <Head title="الجميل">
        <meta name="description" content="ok" />
    </Head>

    <section class="py-20 bg-white tails-selected-element">
     
        <div class="max-w-6xl px-10 mx-auto xl:px-5">
            <div class="flex flex-col justify-center space-y-7">
                <h2
                    class="w-full mx-auto text-4xl font-extrabold leading-none text-left text-red-600 sm:text-5xl md:text-7xl md:text-center"
                >
                    سفرفاي
                </h2>
                <p
                    class="w-full max-w-4xl mx-auto text-xl text-right text-gray-600 md:text-2xl md:text-center"
                >
                    خطط لرحلتك في ثوانٍ معدودة
                </p>

                <form  v-on:submit.prevent="callApi">
                   
                    <div
                        class="flex flex-col w-full mx-auto space-y-5 md:space-y-0 md:space-x-5 md:flex-row"
                    >
                        <input
                            type="text"
                            id="address"
                            name="address"
                            class="flex-1 w-full px-5 py-5 text-base sm:text-lg md:text-xl lg:text-2xl xl:text-2xl border border-gray-300 rounded-lg focus:ring-4 focus:border-red-700 focus:ring-red-600 focus:ring-opacity-50 focus:outline-none bg-gray-100 ml-5"
                            data-primary="blue-600"
                            data-rounded="rounded-lg"
                            placeholder="بغداد, الرياض, دبي ..."
                            required
                            v-model="form.address"
                        />

                        <input
                            type="date"
                            name="start_date"
                            v-model="startDate"
                            class="flex-1 w-full px-5 py-5 text-base sm:text-lg md:text-xl lg:text-2xl xl:text-2xl border border-gray-300 rounded-lg focus:ring-4 focus:border-red-700 focus:ring-red-600 focus:ring-opacity-50 focus:outline-none bg-gray-100"
                            placeholder="Start Date"
                            required
                        />
                        <div class="flex justify-center items-center text-2xl">
                            الى
                        </div>
                        <input
                            type="date"
                            name="end_date"
                            value="{{date('Y-m-d')}}"
                            class="flex-1 w-full px-5 py-5 text-base sm:text-lg md:text-xl lg:text-2xl xl:text-2xl border border-gray-300 rounded-lg focus:ring-4 focus:border-red-700 focus:ring-red-600 focus:ring-opacity-50 focus:outline-none bg-gray-100"
                            placeholder="End Date"
                            required
                        />

                        <button
                            type="submit"
                            class="flex-shrink-0 px-10 py-5 text-2xl font-medium text-center text-white bg-red-600 rounded-lg focus:ring-4 focus:ring-red-600 focus:ring-opacity-50 focus:ring-offset-2 focus:outline-none"
                        >
                            انطلق
                        </button>
                    </div>

                    <div class="container mx-auto max-w-2xl mt-10">
                        <div class="category mt-1">
                            <ul class="flex flex-wrap justify-center">
                                <li
                                    v-for="category in categories"
                                    :key="category.id"
                                    class="py-2 mx-2 my-1 w-full sm:w-full md:w-auto flex justify-center flex-col text-center"
                                >
                                    <input
                                        type="radio"
                                        :id="category.id"
                                        name="categories"
                                        :value="category.title"
                                        class="hidden peer"
                                        required
                                    />
                                    <label
                                        :for="category.id"
                                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-red-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                    >
                                        <div class="block">
                                            <div
                                                class="w-full text-lg font-semibold"
                                            >
                                                {{ category.title }}
                                         
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
