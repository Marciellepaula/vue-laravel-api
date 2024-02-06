<template>
  <h1>List Records</h1>
  <form @submit.prevent="save" class="mt-3" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input v-model="course.value.name" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="photo" class="form-label">Photo:</label>
      <input
        type="file"
        accept="image/png, image/jpeg, image/jpg"
        name="photo"
        class="form-control"
        @change="handleImageChange"
        required
      />
    </div>
    <button type="submit" class="btn btn-success">Save</button>
  </form>
</template>

<script setup>
import { ref } from "vue";
import axios from "redaxios";
import { defineProps } from "vue";
const { id, course } = props;
const course = ref({
  id: "",
  name: "",
  photo: null,
});

const handleImageChange = (event) => {
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      course.value.photo = file;
    };
    reader.readAsDataURL(file);
  }
};

const save = async () => {
  if (course.value.id === "") {
    await saveData();
  } else {
    await updateData();
  }
};

const updateData = async () => {
  try {
    const formData = new FormData();
    formData.append("name", course.value.name);
    formData.append("photo", course.value.photo);

    const editRecords = `http://localhost/api/course/${course.value.id}`;
    await axios.put(editRecords, formData);
    alert("Updated!");
    resetForm();
  } catch (error) {
    console.error("Error updating data:", error);
  }
};

const props = defineProps({
  id: String,
  course: Object,
});

// const resetForm = () => {
//   course.value = { id: "", name: "", photo: null };
// };
</script>
