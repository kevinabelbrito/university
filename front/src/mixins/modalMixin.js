export const modalMixin = {
    data() {
        return {}
    },
    methods: {
        closeModal() {
            this.$emit('close-modal')
        },
    }
}