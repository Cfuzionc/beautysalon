import './bootstrap';
import '@fullcalendar/core/vdom' // solves problem with Vite
import { createApp } from 'vue';

const app = createApp({});


import CalendarComponent from './components/CalendarComponent.vue';
app.component('calendar.component', CalendarComponent);

app.mount('#app');
