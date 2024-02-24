<template>
  <div>
    <h1>Edit Course</h1>
    <form @submit.prevent="updateCourse" class="mt-3" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input v-model="course.name" class="form-control" required />
      </div>

      <!--  -->
      <div class="mb-3">
        <label for="photo" class="form-label">Photo:</label>
        <input type="file" name="photo" :class="{ 'is-invalid': course.errors.has('photo') }" class="form-control"
          @change="handleImageChange" />
        <has-error :course="course" field="image" />
        <img :key="course.id" :src="course.photo" style="width: 200px; height: 200px; object-fit: cover"
          class="img-thumbnail" />
      </div>
      <button type="submit" class="btn btn-success">Update</button>
    </form>
  </div>
</template>

<script setup>
import { ref, defineProps } from "vue";
import axios from "redaxios";
import { useRouter } from "vue-router";
const router = useRouter();
const props = defineProps(["id"]);

// Define reactive variables
const course = ref({
  id: "",
  name: "",
  errors: new Map(), // Initialize errors as an empty Map
  photo: null,
});

const handleImageChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      course.value.photo = reader.result; // Use reader.result instead of reader.file
    };
    reader.readAsDataURL(file);
  }
};

const updateCourse = async () => {
  try {
    const formData = new FormData();
    formData.append("name", course.value.name);
    formData.append("photo", course.value.photo);

    const editUrl = `http://localhost/api/course/${props.id}`;
    await axios.put(editUrl, formData);
    alert("Course updated successfully!");
  } catch (error) {
    console.error("Error updating course:", error);
    alert("Failed to update course. Please try again.");
  }
};

const fetchCourse = async () => {
  try {
    const response = await axios.get(`http://localhost/api/course/${props.id}`);
    const data = response.data.data; // Accessing the nested 'data' object

    // Assign values directly to the course object
    course.value.id = data.id; // Assigning directly to the ref
    course.value.name = data.name; // Directly assign to course object, not course.value
    course.value.photo = data.photo; // Directly assign to course object, not course.value
  } catch (error) {
    console.error("Error fetching course:", error);
    alert("Failed to fetch course data. Please try again.");
  }
};

fetchCourse();

// Expose reactive variables to the template
defineExpose({ course, handleImageChange });
</script>
