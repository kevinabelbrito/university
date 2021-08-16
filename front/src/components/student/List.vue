<template>
    <div>
        <div class="overflow-auto my-10">    
            <table class="table-auto w-full" style="min-width: 1000px;">
                <thead>
                    <tr>
                        <th>Full name</th>
                        <th>Identity</th>
                        <th>Birth</th>
                        <th>Career</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in students" :key="student.id" class="border-b border-gray-200">
                        <td class="py-3 text-center">{{ student.first_name }} {{ student.last_name }}</td>
                        <td class="py-3 text-center">{{ student.id_type }} - {{ student.id_number }}</td>
                        <td class="py-3 text-center">{{ student.date_of_birth }}</td>
                        <td class="py-3 text-center">{{ student.career.name }}</td>
                        <td class="py-3 text-center">
                            <button class="inline-block py-2 px-3 rounded mx-2 hover:text-white hover:bg-green-500 border border-green-500 bg-white text-green-500 transition-all duration-500" @click="loadDetails(student)">
                                <fa icon="eye" />
                            </button>
                            <button class="inline-block py-2 px-3 rounded mx-2 hover:text-white hover:bg-yellow-400 border border-yellow-400 bg-white text-yellow-400 transition-all duration-500">
                                <fa icon="edit" />
                            </button>
                            <button class="inline-block py-2 px-3 rounded mx-2 hover:text-white hover:bg-red-500 border border-red-500 bg-white text-red-500 transition-all duration-500" @click="deleteItem(student.id)">
                                <fa icon="trash-alt" />
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex flex-nowrap items-center justify-end gap-5 my-5">
            <button class="bg-blue-500 text-white border border-blue-500 px-3 py-2">
                <fa icon="chevron-left" />
            </button>
            <button class="bg-blue-500 text-white border border-blue-500 px-3 py-2">
                <fa icon="chevron-right" />
            </button>
        </div>
        <detail-modal 
            v-if="details"
            @close-modal="toggleDetailModal"
            :student="currentStudent"
        />
    </div>
</template>

<script>
import DetailModal from "../../components/student/DetailModal.vue";
import Swal from 'sweetalert2'
export default {
    data(){
        return {
            details: false,
            currentStudent: {}
        }
    },
    components: { DetailModal },
    props:['students'],
    methods: {
        loadDetails(student) {
            console.log('Student ID by List Component',student)
            this.currentStudent = student
            this.toggleDetailModal()
        },
        toggleDetailModal() {
            this.details = !this.details
        },
        deleteItem(studentId) {
            console.log(studentId)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.axios.delete(`students/${studentId}`)
                        .then(() => {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                timer: 5000,
                                showConfirmButton: false,
                                toast: true,
                                position: 'top'
                            })
                            this.$emit('load-data')
                        })
                        .catch(error => console.log(error))
                }
            })
        }
    }
}
</script>