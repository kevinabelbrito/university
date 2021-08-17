<template>
    <div class="bg-white p-10 rounded-lg">
        <div class="flex lg:flex-nowrap flex-wrap items-center lg:justify-between justify-center lg:gap-3 gap-5">
            <div class="lg:w-auto w-full lg:text-left text-center">
                <span class="text-gray-800 text-2xl font-semibold">
                    Students
                </span>
            </div>
            <div class="text-center w-auto">
                <div class="flex md:flex-nowrap flex-wrap items-center justify-center gap-5">
                    <div class="relative md:w-96 w-full">
                        <input 
                            type="text" 
                            name="search" 
                            id="search" 
                            placeholder="Find a student..."
                            @keypress.enter="setSearch"
                            v-model="search"
                            class="py-3 pl-5 pr-12 border-b-2 border-blue-400 text-black text-opacity-40 inline-block w-full placeholder-black placeholder-opacity-20"
                        >
                        <button class="absolute top-0 right-0 p-3 text-black text-opacity-20 hover:text-opacity-70 transition-all duration-500" @click="setSearch">
                            <fa icon="search" />
                        </button>
                    </div>
                    <div class="">
                        <button class="py-3 px-10 text-center bg-pink-700 text-white border border-pink-700 hover:bg-white hover:text-pink-700 transition-all duration-500" @click="cleanFilter">
                            <fa icon="redo-alt" />
                            <span class="ml-2">
                                Reset filter
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:w-auto w-full text-center">
                <button class="inline-block text-center py-3 px-10 text-white font-bold bg-blue-500 border border-blue-500 hover:bg-white hover:text-blue-500 transition-all duration-500" @click="toggleCreateEditForm">
                    <fa icon="user-plus" />
                    <span class="ml-2">Create</span>
                </button>
            </div>
        </div>
        <div class="" v-if="dataList.length > 0">
            <list
                :students="dataList" 
                @load-data="setSearch"
                @edit-student="editStudent($event)"
            />
            <div class="flex md:flex-nowrap flex-wrap items-center md:justify-between justify-center md:gap-3 gap-5 my-5">
                <div class="">
                    <span class="text-lg font-light">
                        {{ pagination.to }} of {{ pagination.total }} registers
                    </span>
                    <select name="per_page" id="per_page" class="border-b-2 border-blue-500 py-3 ml-3 md:text-sm text-xs text-black text-opacity-70 font-normal" v-model="itemsPerPage" @change="setSearch">
                        <option :value="row" v-for="row in itemsPerPageSelector" :key="row">{{ row }}</option>
                    </select>
                </div>
                <pagination 
                    :pagination="pagination"
                    @load-page="loadPage($event)"
                />
            </div>
        </div>
        <div class="p-3 my-10" v-else>
            <p class="text-center font-medium text-lg">Don't have any student</p>
        </div>
        <form-modal
            v-if="createEditForm"
            @close-modal="toggleCreateEditForm"
            @load-data="setSearch"
            :studentId="currentStudentId"
        />
    </div>
</template>

<script>
import List from "../../components/student/List.vue";
import FormModal from "../../components/student/FormModal.vue";
import Pagination from "../../components/Pagination.vue";
import { tablePaginateMixin } from "../../mixins/tablePaginateMixin";
export default {
    data() {
        return {
            baseEndpoint: 'students',
            createEditForm: false,
            currentStudentId: null,
            // itemsPerPage: 60,
            // itemsPerPageSelector: ['30', '60', '100', '200', '500'],
        }
    },
    mixins: [tablePaginateMixin],
    components: { List, FormModal, Pagination },
    methods: {
        toggleCreateEditForm(isEdit = false) {
            this.currentStudentId = !isEdit ? null : this.currentStudentId
            this.createEditForm = !this.createEditForm
        },
        editStudent(studentId) {
            this.currentStudentId = studentId
            this.toggleCreateEditForm(true)
        }
    }
}
</script>