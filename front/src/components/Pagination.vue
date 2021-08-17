<template>
    <div class="flex flex-wrap items-center md:justify-end justify-center gap-3">
        <button 
            class="text-white font-light md:text-sm text-xs rounded border px-3 py-2 transition-all duration-500" 
            :class="paginationActive(pag.active)" 
            v-for="pag in pagination.links" 
            :key="pag.label" 
            @click="sendPage(pag.url)"
        >
            <span v-html="pag.label"></span>
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {}
    },
    props:['pagination'],
    methods: {
        paginationActive(isActive) {
            return isActive ? 'bg-pink-700 border-pink-700' : 'bg-blue-500 border-blue-500 hover:text-blue-500 hover:bg-white'
        },
        sendPage(page) {
            this.$emit('load-page', page)
        }
    },
}
</script>