<template>
  <h1>List Records</h1>
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
    <button type="submit" class="btn btn-success">Save</button>
  </form>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "redaxios";
import { useRouter } from "vue-router";
const router = useRouter();
const result = ref([]);
const courses = ref({
  id: "",
  name: "",
  photo: null,
}); // Initialize as a ref

const handleImageChange = (event) => {
  const file = event.target.files[0];

  if (file) {
    // Your existing code to read and set the file
    const reader = new FileReader();
    reader.onload = () => {
      courses.value.photo = file; // Set the file object, not the base64 representation
    };
    reader.readAsDataURL(file);
  }
};

const save = () => {
  if (courses.value.id === "") {
    saveData();
  } else {
    updateData();
  }
};

const saveData = () => {
  const formData = new FormData();
  formData.append("name", courses.value.name);
  formData.append("photo", courses.value.photo);

  axios
    .post("http://localhost/api/course", formData)
    .then(({ data }) => {
      alert("Saved!");
    })
    .catch((error) => {
      console.error("Error saving data:", error);
    });
};
</script>
