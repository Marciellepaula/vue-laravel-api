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
      <button @click="editCourse(course)" class="btn btn-warning">Edit</button>
      <button @click="removeCourse" class="btn btn-danger">Remove</button>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from "vue";
import { useRouter } from "vue-router";

const { course } = defineProps(["course"]); // Rename the prop to avoid conflict
const router = useRouter();

const editCourse = (selectedCourse) => {
  try {
    // Copying values to avoid reactivity issues
    course.value = { ...selectedCourse };
    // Navigate to the edit student page
    router.push({ name: "CourseUpdate", params: { id: selectedCourse.id } });
  } catch (error) {
    console.error("Error navigating to edit course page:", error);
  }
};

const removeCourse = () => {
  // Handle the remove action for the selected course
  console.log("Remove course with ID:", course.id);
  // You can add the logic to remove the course here
};
</script>
