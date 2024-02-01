<template>
  <div class="container mt-5">
    <button class="btn btn-primary" @click="CourseLoad">Load Courses</button>
    <form @submit.prevent="save" class="mt-3" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input v-model="course.name" class="form-control" required />
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
            v-if="c.photo"
            :src="c.photo"
            alt="Course Photo"
            class="img-thumbnail"
            style="max-width: 100px"
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
const course = ref({
  id: "",
  name: "",
  photo: null,
}); // Initialize as a ref

const handleImageChange = (event) => {
  const file = event.target.files[0];

  if (file) {
    // Read the selected image file
    const reader = new FileReader();

    reader.onload = () => {
      // Set the photo property to the base64 representation of the image
      course.value.photo = reader.result;
    };

    reader.readAsDataURL(file);
  }
};

const save = () => {
  if (course.value.id === "") {
    saveData();
  } else {
    updateData();
  }
};

const saveData = () => {
  axios
    .post("http://localhost/api/course", course.value, {
      headers: {
        "content-type": "multipart/form-data",
      },
    })
    .then(({ data }) => {
      alert("Saved!");
      CourseLoad();
      resetForm();
    });
};

const CourseLoad = () => {
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
  course.value.id = "";
  course.value.name = "";
  course.value.photo = "";
};

const edit = (selectedCourse) => {
  course.value = { ...selectedCourse };
};

const updateData = () => {
  const editRecords = `http://localhost/api/course/${course.value.id}`;
  axios
    .put(editRecords, course.value)
    .then(() => {
      alert("Updated!");
      CourseLoad();
      resetForm();
    })
    .catch((error) => {
      console.error("Error updating data:", error);
    });
};

const remove = (selectedCourse) => {
  const url = `http://localhost/api/course/${selectedCourse.id}`;
  axios
    .delete(url)
    .then(() => {
      alert("Deleted!");
      CourseLoad();
    })
    .catch((error) => {
      console.error("Error deleting data:", error);
    });
};

onMounted(() => {
  console.log("mounted() called....");
  CourseLoad();
});
</script>
