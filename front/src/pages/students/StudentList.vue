<template>
    <div class="bg-white p-10 rounded-lg">
        <div class="flex md:flex-nowrap flex-wrap items-center md:justify-between justify-center md:gap-3 gap-5">
            <div class="md:w-auto w-full md:text-left text-center">
                <span class="text-gray-800 text-2xl font-semibold">
                    Students
                </span>
            </div>
            <div class="text-center md:w-96 w-full">
                <div class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        id="search" 
                        placeholder="Find a student..."
                        class="py-3 pl-5 pr-12 border-b-2 border-blue-400 text-black text-opacity-40 block w-full placeholder-black placeholder-opacity-20"
                    >
                    <button class="absolute top-0 right-0 p-3 text-black text-opacity-20 hover:text-opacity-70 transition-all duration-500">
                        <fa icon="search" />
                    </button>
                </div>
            </div>
            <div class="md:w-auto w-full text-center">
                <button class="inline-block text-center py-3 px-10 text-white font-bold bg-blue-500 border border-blue-500 hover:bg-white hover:text-blue-500 transition-all duration-500" @click="toggleCreateEditForm">
                    <fa icon="user-plus" />
                    <span class="ml-2">Create</span>
                </button>
            </div>
        </div>
        <list 
            :students="students" 
            @load-data="getStudents"
        />
        <form-modal
            v-if="createEditForm"
            @close-modal="toggleCreateEditForm"
            @load-data="getStudents"
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
            createEditForm: false
        }
    },
    components: { List, FormModal },
    methods: {
        async getStudents() {
            await this.axios.get('students')
                .then(response => {
                    this.students = response.data
                })
                .catch(error => console.log(error))
        },
        toggleCreateEditForm() {
            this.createEditForm = !this.createEditForm
        }
    },
    beforeMount(){
        this.getStudents()
    }
}
</script>