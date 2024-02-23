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
    .get("http://localhost/api/course", {
      console.log();
      headers: {
        Authorization: `Bearer ${localStorage.getItem("token")}`, // Include the token in the Authorization header
      },
    })
    .then(({ data }) => {
      result.value = data;
    })
    .catch((error) => {
      if (error) {
        router.push("/login");
      }
    });
};

onMounted(() => {
  console.log("mounted() called....");
  coursesLoad();
});
</script>
