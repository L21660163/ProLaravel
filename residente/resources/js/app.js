import './bootstrap';
import { createApp } from 'vue';
import LoginPage from './components/LoginPage.vue';
import AlumnoDashboard from './components/AlumnoDashboard.vue';

const app = createApp({});

app.component('login-page', LoginPage);
app.component('alumno-dashboard', AlumnoDashboard);

app.mount('#app');

console.log('Vue app created');