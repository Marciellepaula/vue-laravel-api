// main.js
import { createApp } from "vue";
import App from "./App.vue";
import "./style.css";
import { createRouter, createWebHistory } from "vue-router";

import Course from "./components/Course.vue";
import Student from "./components/Student.vue";

const routes = [
  { path: "/Course", component: Course },
  { path: "/Student", component: Student },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const app = createApp(App);
app.use(router);

app.mount("#app");
