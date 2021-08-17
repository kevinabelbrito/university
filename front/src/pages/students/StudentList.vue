<template>
    <div class="bg-white p-10 rounded-lg">
        <div class="flex md:flex-nowrap flex-wrap items-center md:justify-between justify-center md:gap-3 gap-5">
            <div class="md:w-auto w-full md:text-left text-center">
                <span class="text-gray-800 text-2xl font-semibold">
                    Students
                </span>
            </div>
            <div class="text-center w-auto">
                <div class="flex sm:flex-nowrap flex-wrap items-center justify-center gap-5">
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
                            <fa icon="refresh" />
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
        <div class="" v-if="students.length > 0">
            <list
                :students="students" 
                @load-data="getStudents"
                @edit-student="editStudent($event)"
            />
            <div class="flex flex-nowrap items-center justify-end gap-3 my-5">
                <button 
                    class="text-white font-light text-sm rounded border px-3 py-2 transition-all duration-500" 
                    :class="paginationActive(pag.active)" 
                    v-for="pag in pagination.links" 
                    :key="pag.label" 
                    @click="loadPage(pag.url)"
                >
                    <span v-html="pag.label"></span>
                </button>
            </div>
        </div>
        <div class="p-3 my-10" v-else>
            <p class="text-center font-medium text-lg">Don't have any student</p>
        </div>
        <form-modal
            v-if="createEditForm"
            @close-modal="toggleCreateEditForm"
            @load-data="getStudents"
            :studentId="currentStudentId"
        />
    </div>
</template>

<script>
import List from "../../components/student/List.vue";
import FormModal from "../../components/student/FormModal.vue";
export default {
    data() {
        return {
            students: [],
            pagination: {},
            endpoint: 'students',
            createEditForm: false,
            currentStudentId: null,
            search: ''
        }
    },
    components: { List, FormModal },
    methods: {
        async getStudents() {
            await this.axios.get(this.endpoint, {
                params:{
                    per_page: this.pagination.per_page,
                    search: this.search
                }
            })
                .then(response => {
                    this.students = response.data.data
                    this.pagination = response.data.meta
                    console.log(this.pagination)
                })
                .catch(error => console.log(error))
        },
        toggleCreateEditForm(isEdit = false) {
            this.currentStudentId = !isEdit ? null : this.currentStudentId
            this.createEditForm = !this.createEditForm
        },
        editStudent(studentId) {
            this.currentStudentId = studentId
            this.toggleCreateEditForm(true)
        },
        setSearch() {
            this.endpoint = 'students'
            this.getStudents()
        },
        cleanFilter() {
            this.search = '',
            this.getStudents()
        },
        loadPage(page) {
            this.endpoint = page
            this.getStudents()
        },
        paginationActive(isActive) {
            return isActive ? 'bg-pink-700 border-pink-700' : 'bg-blue-500 border-blue-500 hover:text-blue-500 hover:bg-white'
        }
    },
    beforeMount(){
        this.getStudents()
    }
}
</script>