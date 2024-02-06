// main.js
import { createApp } from "vue";
import App from "./App.vue";
import "./style.css";
import { createRouter, createWebHistory } from "vue-router";

import Student from "./components/Student.vue";
import CourseUpdate from "./components/CourseUpdate.vue";

const routes = [
  {
    path: "/courseUpdate/:id", // Dynamic route parameter
    name: "CourseUpdate",
    component: CourseUpdate,
    props: true,
  },
  { path: "/Student", component: Student },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});
export default router;
createApp(App).use(router).mount("#app");
