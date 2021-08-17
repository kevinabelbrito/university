<template>
    <!-- component -->
    <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none" id="modal-id">
        <div class="absolute bg-black bg-opacity-70 inset-0 z-0"></div>
        <div class="w-full 2xl:max-w-2xl max-w-xl relative mx-auto my-auto rounded-xl shadow-modal bg-white overflow-auto max-h-full">
            <!--content-->
            <div class="relative">
                <!--close buttom-->
                <button class="absolute top-0 right-0 text-black text-opacity-30 hover:text-red-500 hover:text-opacity-50 p-5 transition-all duration-500" @click="closeModal">
                    <fa icon="times" />
                </button>
                <!--body-->
                <div class="grid lg:grid-cols-2 grid-cols-1 items-center gap-5 p-10">
                    <div class="">
                        <label for="first_name" class="form-label">
                            First Name
                        </label>
                        <div class="relative">
                            <input type="text" name="first_name" id="first_name" class="form-input" v-model="dataForm.first_name">
                            <span class="form-icon">
                                <fa icon="user" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="last_name" class="form-label">
                            Last Name
                        </label>
                        <div class="relative">
                            <input type="text" name="last_name" id="last_name" class="form-input" v-model="dataForm.last_name">
                            <span class="form-icon">
                                <fa icon="book" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="id_type" class="form-label">
                            ID Type
                        </label>
                        <div class="relative">
                            <select name="id_type" id="id_type" class="form-input" v-model="dataForm.id_type">
                                <option value="">Select an option</option>
                                <option :value="type" v-for="type of getIdTypes" :key="type">{{ type }}</option>
                            </select>
                            <span class="form-icon">
                                <fa icon="id-card-alt" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="id_number" class="form-label">
                            ID Number
                        </label>
                        <div class="relative">
                            <input type="text" name="id_number" id="id_number" class="form-input" v-model="dataForm.id_number">
                            <span class="form-icon">
                                <fa icon="id-card" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="date_of_birth" class="form-label">
                            Date of Birth
                        </label>
                        <div class="relative">
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-input" v-model="dataForm.date_of_birth">
                            <span class="form-icon">
                                <fa icon="calendar" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="genre" class="form-label">
                            Genre
                        </label>
                        <div class="relative">
                            <select name="genre" id="genre" class="form-input" v-model="dataForm.genre">
                                <option value="">Select an option</option>
                                <option :value="type" v-for="type of getGenres" :key="type">{{ type }}</option>
                            </select>
                            <span class="form-icon">
                                <fa icon="venus-mars" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="email_address" class="form-label">
                            E-Mail
                        </label>
                        <div class="relative">
                            <input type="email" name="email_address" id="email_address" class="form-input" v-model="dataForm.email_address">
                            <span class="form-icon">
                                <fa icon="envelope" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="phone_number" class="form-label">
                            Phone Number
                        </label>
                        <div class="relative">
                            <input type="tel" name="phone_number" id="phone_number" class="form-input" v-model="dataForm.phone_number">
                            <span class="form-icon">
                                <fa icon="phone" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="career" class="form-label">
                            Career
                        </label>
                        <div class="relative">
                            <select name="career" id="career" class="form-input" v-model="dataForm.career_id">
                                <option value="">Select an option</option>
                                <option :value="career.id" v-for="career of careers" :key="career.id">#{{ career.code_number }} - {{ career.name }} ({{ career.code_string }})</option>
                            </select>
                            <span class="form-icon">
                                <fa icon="medal" />
                            </span>
                        </div>
                    </div>
                </div>
                <!--footer-->
                <div class="flex justify-center gap-5 border-t border-gray-200 p-5">
                    <button class="bg-blue-500 border border-blue-500 text-white hover:text-blue-500 hover:bg-white font-medium 2xl:text-base text-sm py-2.5 px-10 transition-all duration-500" @click.prevent="closeModal">
                        <fa icon="times" />
                        <span class="ml-3">
                            Cancel
                        </span>
                    </button>
                    <button class="bg-yellow-400 border border-yellow-400 text-white hover:text-yellow-400 hover:bg-white font-medium 2xl:text-base text-sm py-2.5 px-10 transition-all duration-500" @click.prevent="saveStudent">
                        <fa icon="save" />
                        <span class="ml-3">
                            Save
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { modalMixin } from '../../mixins/modalMixin'
import Swal from 'sweetalert2'
export default {
    data() {
        return {
            dataForm: {},
            careers: []
        }
    },
    props:['studentId'],
    mixins: [modalMixin],
    computed: {
        getIdTypes() {
            return ['DNI', 'Passport']
        },
        getGenres() {
            return ['Female', 'Male', 'Other']
        }
    },
    methods: {
        saveStudent() {
            if (this.studentId) {
                this.editStudent(this.studentId)
            }
            else {
                this.newStudent()
            }
        },
        async newStudent() {
            await this.axios.post('students', this.dataForm)
                .then(response => {
                    console.log(response)
                    Swal.fire({
                        title: 'Well done!',
                        text: 'The student has been registered successfully',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false,
                        toast: true,
                        position: 'bottom'
                    })
                    this.$emit('load-data')
                    this.closeModal()
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Ups!',
                        text: error.response.data.message,
                        icon: 'error',
                        toast:true,
                        position: 'bottom'
                    })
                })
        },
        async editStudent(studentId) {
            await this.axios.put(`students/${studentId}`, this.dataForm)
                .then(response => {
                    console.log(response)
                    Swal.fire({
                        title: 'Well done!',
                        text: 'The student has been updated successfully',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false,
                        toast: true,
                        position: 'bottom'
                    })
                    this.$emit('load-data')
                    this.closeModal()
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Ups!',
                        text: error.response.data.message,
                        icon: 'error',
                        toast:true,
                        position: 'bottom'
                    })
                })
        },
        async getCareers() {
            await this.axios.get('careers')
                    .then(response => this.careers = response.data)
                    .catch(error => console.log(error))
        },
        async loadStudent() {
            if(this.studentId) {
                await this.axios.get(`students/${this.studentId}`)
                    .then(response => {
                        this.setDataForm(response.data)
                    })
                    .catch(error => console.log(error))
            }
            else {
                this.cleanForm()
            }
        },
        cleanForm() {
            this.dataForm = {
                first_name: '',
                last_name: '',
                id_type: '',
                id_number: '',
                date_of_birth: '',
                genre: '',
                email_address: '',
                phone_number: '',
                career_id: ''
            }
        },
        setDataForm(data) {
            this.dataForm = {
                first_name: data.first_name,
                last_name: data.last_name,
                id_type: data.id_type,
                id_number: data.id_number,
                date_of_birth: data.date_of_birth,
                genre: data.genre,
                email_address: data.email_address,
                phone_number: data.phone_number,
                career_id: data.career.id
            }
        }
    },
    mounted() {
        this.getCareers()
        this.loadStudent()
    },
}
</script>