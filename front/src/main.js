import { createApp } from 'vue'
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'

import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";

library.add(fas, far)

createApp(App)
    .use(router)
    .component('fa', FontAwesomeIcon)
    .mount('#app')
