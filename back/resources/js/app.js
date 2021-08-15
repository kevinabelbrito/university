require('./bootstrap');

import { createApp } from 'vue'
import router from "./router"
import App from "./App.vue"

createApp({
    components: {
        App,
    }
}).use(router).mount("#app");
