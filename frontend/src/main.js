import { createApp } from "vue";
import App from "./App.vue";
import "./style.css";
import { createRouter, createWebHistory } from "vue-router";

import CourseForm from "./components/CourseForm.vue";
import CourseUpdate from "./components/CourseUpdate.vue";
import CourseList from "./components/CourseList.vue";

const routes = [
  { path: "/", redirect: "/courses" }, // Redirect to courses list by default
  { path: "/courses", component: CourseList }, // Route for the course list
  { path: "/courses/new", component: CourseForm }, // Route for adding a new course
  {
    path: "/courseUpdate/:id",
    name: "CourseUpdate",
    component: CourseUpdate,
    props: true,
  }, // Route for editing a course
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

createApp(App).use(router).mount("#app");
export default router;
