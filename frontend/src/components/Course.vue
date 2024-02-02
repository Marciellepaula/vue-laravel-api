<template>
  <div class="container mt-5">
    <button class="btn btn-primary" @click="coursesLoad">Load coursess</button>
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
    <ul class="mt-3 list-group">
      <li v-for="c in result" :key="c.id" class="list-group-item">
        <div class="d-flex justify-content-between align-items-center">
          <span>{{ c.name }}</span>
          <img
            :src="c.photo"
            alt="Course Photo"
            class="img-thumbnail"
            style="max-width: 500px"
          />
          <div>
            <button @click="edit(c)" class="btn btn-warning">Edit</button>
            <button @click="remove(c)" class="btn btn-danger">Remove</button>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "redaxios";

const result = ref([]); // Initialize as a ref
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
      coursesLoad();
      resetForm();
    })
    .catch((error) => {
      console.error("Error saving data:", error);
    });
};

const coursesLoad = () => {
  axios
    .get("http://localhost/api/course")
    .then(({ data }) => {
      result.value = data;
    })
    .catch((error) => {
      console.error("Error loading courses:", error);
    });
};
const resetForm = () => {
  courses.value.id = "";
  courses.value.name = "";
  courses.value.photo = "";
};

const edit = (selectedcourses) => {
  courses.value = { ...selectedcourses };
};
// Define the base API URL here

const updateData = () => {
  const editRecords = `http://localhost/api/course/${courses.value.id}`;
  axios
    .put(editRecords, courses.value)
    .then(() => {
      alert("Updated!");
      coursesLoad();
      resetForm();
    })
    .catch((error) => {
      console.error("Error updating data:", error);
    });
};

const remove = (selectedcourses) => {
  const url = `http://localhost/api/course/${selectedcourses.id}`;
  axios
    .delete(url)
    .then(() => {
      alert("Deleted!");
      coursesLoad();
    })
    .catch((error) => {
      console.error("Error deleting data:", error);
    });
};

onMounted(() => {
  console.log("mounted() called....");
  coursesLoad();
});
</script>
