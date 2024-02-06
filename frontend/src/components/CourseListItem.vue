<template>
  <div class="d-flex justify-content-between align-items-center">
    <span>{{ course.name }}</span>
    <img
      :src="course.photo"
      alt="Course Photo"
      class="img-thumbnail"
      style="max-width: 500px"
    />
    <div>
      <router-link :to="{ name: 'CourseUpdate', params: { id: course.id } }"
        >Edit</router-link
      >
      <button @click="removeCourse" class="btn btn-danger">Remove</button>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";
import { useRouter } from "vue-router";
const { course } = defineProps(["course"]); // Rename the prop to avoid conflict
const router = useRouter();
const { emit } = defineEmits();
import axios from "redaxios";

import CourseUpdate from "./CourseUpdate.vue"; // Use PascalCase for component names

const removeCourse = (selectedCourse) => {
  // Handle the remove action for the selected course
  console.log("Remove course:", selectedCourse);
};
</script>
