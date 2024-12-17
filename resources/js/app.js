import "../css/app.css";
import "./bootstrap";
import { createApp } from "vue";
import Restaurant from "./Components/Restaurants.vue";
import Seat from "./Components/Seat.vue";

// Create Vue app and mount the component
const app = createApp();

app.component("restaurant-list", Restaurant);
app.component("seat", Seat);

app.mount("#app");
