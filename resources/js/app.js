import '../css/app.css';
import './bootstrap';
import { createApp } from 'vue';
import Restaurant from './Components/Restaurants.vue';

// Create Vue app and mount the component
const app = createApp({});
app.component('restaurant-card', Restaurant);
app.mount('#app');
