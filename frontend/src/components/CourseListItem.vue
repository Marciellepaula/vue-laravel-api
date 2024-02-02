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
      <button @click="editCourse" class="btn btn-warning">Edit</button>
      <button @click="removeCourse" class="btn btn-danger">Remove</button>
    </div>
  </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from "vue";

const { course } = defineProps(["course"]);
const { emit } = defineEmits();

const editCourse = () => {
  emit("edit", course);
};

const removeCourse = () => {
  emit("remove", course);
};
</script>
