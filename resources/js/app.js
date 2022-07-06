import { createApp } from 'vue';
import VueTelInput from "vue3-tel-input";
import 'vue3-tel-input/dist/vue3-tel-input.css';
import { createPinia } from "pinia";
import axios from 'axios'
import VueAxios from 'vue-axios'
import App from './App.vue';

const app = createApp({})
app.use(VueAxios, axios);
app.provide('axios', app.config.globalProperties.axios) // provide 'axios'
app.use(createPinia());
app.use(VueTelInput, {
    autoFormat: false,
    initialCountry: 'auto',
    showDialCode: false,
});

app.component('App', App)
app.mount('#multi__step__form')