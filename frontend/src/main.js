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
  { path: "/", component: Home, meta: { requiresAuth: true } }, // Redirect to courses list by default
  { path: "/courses", component: CourseList, meta: { requiresAuth: true } }, // Route for the course list
  { path: "/courses/new", component: CourseForm, meta: { requiresAuth: true } }, // Route for adding a new course
  {
    path: "/courseUpdate/:id",
    name: "CourseUpdate",
    component: CourseUpdate,
    props: true,
    meta: { requiresAuth: true },
  }, // Route for editing a course
  { path: "/register", component: register }, // Route for the course list
  { path: "/login", component: login },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// router.beforeEach((to, from, next) => {
//   const isAuthenticated = // logic to check if the user is authenticated, like checking if there's a token in localStorage or a Vuex store
//   if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
//     next('/login'); // redirect to login if trying to access a route that requires authentication and the user is not authenticated
//   } else {
//     next();
//   }
// });
createApp(App).use(router).mount("#app");
export default router;
