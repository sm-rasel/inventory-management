import './assets/main.css'
import { createApp } from "vue";
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@fortawesome/fontawesome-svg-core'
import '@fortawesome/vue-fontawesome'
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { fas } from '@fortawesome/free-solid-svg-icons'
library.add(fas)
import vueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import 'bootstrap'
import toast from '@meforma/vue-toaster';
import 'vue3-toastify/dist/index.css'

import { defineRule } from 'vee-validate'
import AllRules from '@vee-validate/rules';

Object.keys(AllRules).forEach(rule => {
  defineRule(rule, AllRules[rule]);
});

//Initialize table component globally
import BtTable from "./components/core/table/bt-table.vue";

const app = createApp(App)
app.use(router,store, vueSweetalert2, toast)
app.config.globalProperties.$store=store
app.component("fa", FontAwesomeIcon)
app.component("BtTable", BtTable)
app.mount('#app');

