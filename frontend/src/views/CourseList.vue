<template>
  <h1>List Records</h1>
  <ul class="mt-3 list-group">
    <CourseListItem
      v-for="course in result"
      :key="course.id"
      :course="course"
    />
  </ul>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "redaxios";
import CourseListItem from "./CourseListItem.vue";

const result = ref([]);

const coursesLoad = () => {
  axios
    .get("http://localhost/api/course")
    .then(({ data }) => {
      result.value = data;
    })
    .catch((error) => {
      if (error.response && error.response.status === 401) {
        // Redirect to the login page
        router.push("/login"); // Assuming 'router' is your Vue Router instance
      } else {
        console.error("Error loading courses:", error);
      }
    });
};

onMounted(() => {
  console.log("mounted() called....");
  coursesLoad();
});
</script>
