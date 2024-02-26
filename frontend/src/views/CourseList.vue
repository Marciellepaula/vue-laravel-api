<template>
  <Header />
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
import Header from "../components/Header.vue";

const result = ref([]);

const page = ref(1);
const totalPages = ref(null);

const coursesLoad = () => {
  const token = localStorage.getItem("token");
  if (!token) {
    console.error("Token not found in localStorage");
    return;
  }
  axios
    .get("http://localhost/api/course", {
      headers: {
        Authorization: `Bearer ${token}`, // Include the token in the Authorization header
      },
    })
    .then(({ data }) => {
      result.value = data.data;
      console.log(result.value);
    })
    .catch((error) => {
      console.error("Error loading courses:", error);
    });
};

onMounted(() => {
  console.log("mounted() called....");
  coursesLoad();
});
</script>
