export const tablePaginateMixin = {
    data() {
        return {
            dataList: [],
            pagination: {},
            itemsPerPage: 10,
            itemsPerPageSelector: ['10', '25', '50', '100'],
            endpoint: '',
            baseEndpoint: '',
            search: ''
        }
    },
    methods: {
        async getDataList() {
            await this.axios.get(this.endpoint, {
                params:{
                    per_page: this.itemsPerPage,
                    search: this.search
                }
            })
                .then(response => {
                    this.dataList = response.data.data
                    this.pagination = response.data.meta
                    console.log(this.pagination)
                })
                .catch(error => console.log(error))
        },
        setSearch() {
            this.endpoint = this.baseEndpoint
            this.getDataList()
        },
        cleanFilter() {
            this.search = '',
            this.getDataList()
        },
        loadPage(page) {
            this.endpoint = page
            this.getDataList()
        },
    },
    beforeMount(){
        this.endpoint = this.baseEndpoint
        this.getDataList()
    }
}