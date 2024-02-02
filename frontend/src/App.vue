<template>
  <div class="container mt-5">
    <button class="btn btn-primary" @click="coursesLoad">Load courses</button>
    <CourseForm :buttonLabel="buttonLabel" />
    <CourseList :result="result" @edit="edit" @remove="remove" />
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "redaxios";
import CourseForm from "./components/CourseForm.vue";
import CourseList from "./components/CourseList.vue";

const result = ref([]); // Initialize as a ref
const courses = ref({
  id: "",
  name: "",
  photo: null,
}); // Initialize as a ref

const buttonLabel = ref("Save");

const save = () => {
  if (courses.value.id === "") {
    saveData();
  } else {
    updateData();
  }
};

// ... Rest of your existing setup code ...

onMounted(() => {
  console.log("mounted() called....");
  coursesLoad();
});
</script>
