<template>
  <form @submit.prevent="save" class="mt-3" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input v-model="courseData.name" class="form-control" required />
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

const courseData = ref({
  id: "",
  name: "",
  photo: null,
});

const handleImageChange = (event) => {
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = () => {
      courseData.value.photo = file;
    };
    reader.readAsDataURL(file);
  }
};

const save = async () => {
  if (courseData.value.id === "") {
    await saveData();
  } else {
    await updateData();
  }
};

const saveData = async () => {
  try {
    const formData = new FormData();
    formData.append("name", courseData.value.name);
    formData.append("photo", courseData.value.photo);

    const response = await axios.post("http://localhost/api/course", formData);
    alert("Saved!");
    resetForm();
  } catch (error) {
    console.error("Error saving data:", error);
  }
};

const updateData = async () => {
  try {
    const formData = new FormData();
    formData.append("name", courseData.value.name);
    formData.append("photo", courseData.value.photo);

    const editRecords = `http://localhost/api/course/${courseData.value.id}`;
    await axios.put(editRecords, formData);
    alert("Updated!");
    resetForm();
  } catch (error) {
    console.error("Error updating data:", error);
  }
};

const resetForm = () => {
  courseData.value = { id: "", name: "", photo: null };
};
</script>
