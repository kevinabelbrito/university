<template>
    <!-- component -->
    <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none" id="modal-id">
        <div class="absolute bg-black bg-opacity-70 inset-0 z-0" @click.prevent="closeModal"></div>
        <div class="w-full 2xl:max-w-2xl max-w-xl relative mx-auto my-auto rounded-xl shadow-modal bg-white">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="grid lg:grid-cols-2 grid-cols-1 items-center gap-5 p-10">
                    <div class="">
                        <label for="first_name" class="font-bold">
                            First Name
                        </label>
                        <div class="relative">
                            <input type="text" name="first_name" id="first_name" class="form-input">
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="user" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="last_name" class="font-bold">
                            Last Name
                        </label>
                        <div class="relative">
                            <input type="text" name="last_name" id="last_name" class="form-input">
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="times" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="id_type" class="font-bold">
                            ID Type
                        </label>
                        <div class="relative">
                            <select name="id_type" id="id_type" class="form-input">
                                <option value="">Select an option</option>
                                <option :value="type" v-for="type of getIdTypes" :key="type">{{ type }}</option>
                            </select>
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="user" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="id_number" class="font-bold">
                            ID Number
                        </label>
                        <div class="relative">
                            <input type="text" name="id_number" id="id_number" class="form-input">
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="user" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="date_of_birth" class="font-bold">
                            Date of Birth
                        </label>
                        <div class="relative">
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-input">
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="calendar" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="genre" class="font-bold">
                            Genre
                        </label>
                        <div class="relative">
                            <select name="genre" id="genre" class="form-input">
                                <option value="">Select an option</option>
                                <option :value="type" v-for="type of getGenres" :key="type">{{ type }}</option>
                            </select>
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="user" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="email_address" class="font-bold">
                            E-Mail
                        </label>
                        <div class="relative">
                            <input type="email" name="email_address" id="email_address" class="form-input">
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="envelope" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="phone_number" class="font-bold">
                            Phone Number
                        </label>
                        <div class="relative">
                            <input type="tel" name="phone_number" id="phone_number" class="form-input">
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="phone" />
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <label for="career" class="font-bold">
                            Career
                        </label>
                        <div class="relative">
                            <select name="career" id="career" class="form-input">
                                <option value="">Select an option</option>
                                <option :value="career.id" v-for="career of getCareers" :key="career.id">{{ career.name }}</option>
                            </select>
                            <span class="absolute left-0 top-0 p-3">
                                <fa icon="user" />
                            </span>
                        </div>
                    </div>
                </div>
                <!--footer-->
                <div class="flex justify-center gap-5 border-t border-conexoo-gray-600 p-5">
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
            dataForm: {}
        }
    },
    props:['student'],
    mixins: [modalMixin],
    computed: {
        getIdTypes() {
            return ['DNI', 'Passport']
        },
        getGenres() {
            return ['Female', 'Male', 'Other']
        },
        getCareers() {
            return [
                {
                    id: 1,
                    name: 'System Engineer'
                },
                {
                    id: 2,
                    name: 'Industrial Engineer'
                },
                {
                    id: 3,
                    name: 'Civil Engineer'
                },
                {
                    id: 4,
                    name: 'Electronic Engineer'
                }
            ]
        }
    },
    methods: {
        async saveStudent() {
            await Swal.fire({
                title: 'Well done!',
                text: 'The student has been registered successfully',
                icon: 'success',
                timer: 5000,
                showConfirmButton: false,
                toast: true,
                position: 'bottom'
            })
            this.closeModal()
        }
    }
}
</script>