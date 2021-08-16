import { createApp } from 'vue'
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import App from './App.vue'
import axios from 'axios';
import VueAxios from 'vue-axios'
import router from './router'
import './assets/tailwind.css'

import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";

library.add(fas, far)

axios.defaults.baseURL = 'http://localhost:8000/api/'
axios.defaults.headers = {
    'Accept': 'application/json'
}

createApp(App)
    .use(router)
    .use(VueAxios, axios)
    .component('fa', FontAwesomeIcon)
    .mount('#app')
