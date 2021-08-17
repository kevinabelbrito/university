<template>
    <!-- component -->
    <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none" id="modal-id">
        <div class="absolute bg-black bg-opacity-70 inset-0 z-0"></div>
        <div class="w-full max-w-3xl relative mx-auto my-auto rounded-xl shadow-modal bg-white">
            <!--content-->
            <div class="relative">
                <!--close buttom-->
                <button class="absolute top-0 right-0 text-black text-opacity-30 hover:text-red-500 hover:text-opacity-50 p-5 transition-all duration-500" @click="closeModal">
                    <fa icon="times" />
                </button>
                <!--body-->
                <div class="grid lg:grid-cols-2 grid-cols-1 items-center gap-5 p-10">
                    <div class="">
                        <span class="details-label">
                            <fa icon="user" class="mr-2" />
                            First Name
                        </span>
                        <span class="font-light ml-5">
                            {{ student.first_name }}
                        </span>
                    </div>
                    <div class="">
                        <span class="details-label">
                            <fa icon="book" class="mr-2" />
                            Last Name
                        </span>
                        <span class="font-light ml-5">
                            {{ student.last_name }}
                        </span>
                    </div>
                    <div class="">
                        <span class="details-label">
                            <fa icon="id-card-alt" class="mr-2" />
                            ID Type
                        </span>
                        <span class="font-light ml-5">
                            {{ student.id_type }}
                        </span>
                    </div>
                    <div class="">
                        <span class="details-label">
                            <fa icon="id-card" class="mr-2" />
                            ID Number
                        </span>
                        <span class="font-light ml-5">
                            {{ student.id_number }}
                        </span>
                    </div>
                    <div class="">
                        <span class="details-label">
                            <fa icon="calendar" class="mr-2" />
                            Date of Birth
                        </span>
                        <span class="font-light ml-5">
                            {{ student.date_of_birth }}
                        </span>
                    </div>
                    <div class="">
                        <span class="details-label">
                            <fa icon="venus-mars" class="mr-2" />
                            Genre
                        </span>
                        <span class="font-light ml-5">
                            {{ student.genre }}
                        </span>
                    </div>
                    <div class="">
                        <span class="details-label">
                            <fa icon="envelope" class="mr-2" />
                            E-Mail
                        </span>
                        <span class="font-light ml-5">
                            {{ student.email_address }}
                        </span>
                    </div>
                    <div class="">
                        <span class="details-label">
                            <fa icon="phone" class="mr-2" />
                            Phone Number
                        </span>
                        <span class="font-light ml-5">
                            {{ student.phone_number }}
                        </span>
                    </div>
                    <div class="">
                        <span class="details-label">
                            <fa icon="medal" class="mr-2" />
                            Career
                        </span>
                        <span class="font-light ml-5">
                            {{ student.career.name }}
                        </span>
                    </div>
                </div>
                <!--footer-->
                <div class="flex justify-center gap-5 border-t border-gray-200 p-5">
                    <button class="bg-blue-500 border border-blue-500 text-white hover:text-blue-500 hover:bg-white font-medium 2xl:text-base text-sm py-2.5 px-10 transition-all duration-500" @click.prevent="closeModal">
                        <fa icon="times" />
                        <span class="ml-3">
                            Close
                        </span>
                    </button>
                    <button class="bg-yellow-400 border border-yellow-400 text-white hover:text-yellow-400 hover:bg-white font-medium 2xl:text-base text-sm py-2.5 px-10 transition-all duration-500" @click.prevent="editStudent()">
                        <fa icon="edit" />
                        <span class="ml-3">
                            Edit
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { modalMixin } from '../../mixins/modalMixin'
export default {
    data() {
        return {}
    },
    props:['student'],
    mixins: [modalMixin],
    methods: {
        editStudent() {
            this.$emit('edit-student', this.student.id)
            this.closeModal()
        }
    },
}
</script>