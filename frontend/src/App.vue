<template>
  <div class="container mt-5">
    <button class="btn btn-primary" @click="coursesLoad">Load courses</button>
    <CourseForm :buttonLabel="buttonLabel" />
    <!-- Example usage in the parent component -->

    <CourseList :result="course" @edit="editCourse" @remove="removeCourse" />
  </div>
</template>

<script setup>
import CourseListItem from "./components/CourseListItem.vue";
import { ref } from "vue";
import axios from "redaxios";
import CourseForm from "./components/CourseForm.vue";
import CourseList from "./components/CourseList.vue";
import courseUpdate from "./components/CourseUpdate.vue";

const result = ref([]);
const course = ref({
  id: "",
  name: "",
  photo: null,
});
const buttonLabel = ref("Save");

const save = () => {
  if (courses.value.id === "") {
    // Your existing save logic
  } else {
    // Your existing update logic
  }
};

const editCourse = (selectedCourse) => {
  // Handle the edit action for the selected course
  console.log("Edit course:", selectedCourse);
};

const removeCourse = (selectedCourse) => {
  // Handle the remove action for the selected course
  console.log("Remove course:", selectedCourse);
};
</script>
