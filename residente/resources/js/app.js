import './bootstrap';
import { createApp } from 'vue';
import LoginPage from './components/LoginPage.vue';

const app = createApp({});

app.component('login-page', LoginPage);

app.mount('#app');

// Agregue esto para debug
console.log('Vue app created');