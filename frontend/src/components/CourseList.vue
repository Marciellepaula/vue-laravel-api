<template>
  <ul class="mt-3 list-group">
    <li v-for="c in result" :key="c.id" class="list-group-item">
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
      <CourseListItem :course="c" @edit="edit" @remove="remove" />
    </li>
  </ul>
</template>

<script setup>
import { ref } from "vue";
import CourseListItem from "./CourseListItem.vue";

const result = ref([]); // Initialize as a ref

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
</script>
