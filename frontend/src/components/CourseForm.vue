<template>
  <form @submit.prevent="save" class="mt-3" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input v-model="courses.name" class="form-control" required />
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
    <button type="submit" class="btn btn-success">{{ buttonLabel }}</button>
  </form>
</template>

<script setup>
import { ref } from "vue";

const courses = ref({
  id: "",
  name: "",
  photo: null,
}); // Initialize as a ref

const handleImageChange = (event) => {
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      courses.value.photo = file;
    };
    reader.readAsDataURL(file);
  }
};
</script>
