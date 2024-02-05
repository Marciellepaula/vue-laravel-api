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
      <button @click="editCourse(course.id)" class="btn btn-warning">
        Edit
      </button>

      <button @click="removeCourse" class="btn btn-danger">Remove</button>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";
import { useRouter } from "vue-router";
const { course } = defineProps(["course"]);
const router = useRouter();
const { emit } = defineEmits();
import axios from "redaxios";

import updatecourse from "./CourseUpdate.vue";
const editCourse = async (id) => {
  try {
    const response = await axios.get(`http://localhost/api/course/5`);
    const course = response.data.course;

    // Now, you can navigate to the 'updatecourse' page and pass courseDetailsValue
    router.push({
      name: "/updatecourse",
      params: { course: course },
    });

    // Alternatively, emit the "edit" event and let the parent handle the navigation and data
    emit("edit", course);
  } catch (error) {
    console.error("Error fetching course details:", error);
  }
};

const removeCourse = (selectedCourse) => {
  // Handle the remove action for the selected course
  console.log("Remove course:", selectedCourse);
};
</script>
