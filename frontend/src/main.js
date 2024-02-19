import { createApp } from "vue";
import App from "./App.vue";
import "./style.css";
import { createRouter, createWebHistory } from "vue-router";

import CourseForm from "./views/CourseForm.vue";
import CourseUpdate from "./views/CourseUpdate.vue";
import CourseList from "./views/CourseList.vue";
import Home from "./views/Home.vue";
import login from "./components/auth/login.vue";
import register from "./components/auth/register.vue";

const routes = [
  { path: "/", component: Home }, // Redirect to courses list by default
  { path: "/courses", component: CourseList }, // Route for the course list
  { path: "/courses/new", component: CourseForm }, // Route for adding a new course
  {
    path: "/courseUpdate/:id",
    name: "CourseUpdate",
    component: CourseUpdate,
    props: true,
  }, // Route for editing a course
  { path: "/register", component: register }, // Route for the course list
  { path: "/login", component: login },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

createApp(App).use(router).mount("#app");
export default router;
