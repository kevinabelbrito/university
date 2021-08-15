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
        <list :students="students" />
        <form-modal
            v-if="createEditForm"
            @close-modal="toggleCreateEditForm"
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
        getStudents() {
            let items = []
            for(let i= 0; i < 20; i++) {
                const element = {
                    id: parseInt(Math.random()*100),
                    first_name: 'Kevin Abel',
                    last_name: 'Brito Diaz',
                    id_type: 'Passport',
                    id_number: '1234567894',
                    date_of_birth: '1993-01-21',
                    genre: 'Male',
                    career: {
                        id: 1,
                        name: 'System Engineer'
                    },
                    email_address: 'kevin@test.com',
                    phone_number: '+584141234567'
                }
                items.push(element)
            }
            this.students = items
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