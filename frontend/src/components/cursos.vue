<template>
  <div>
    <button @click="CourseLoad">Load Courses</button>
    <form @submit.prevent="save">
      <label for="name">Name:</label>
      <input v-model="course.name" required />
      <label for="instructor">Instructor:</label>
      <input v-model="course.instructor" required />
      <label for="photo">Photo:</label>
      <input v-model="course.photo" required />
      <button type="submit">Save</button>
    </form>
    <ul>
      <li v-for="c in result" :key="c.id">
        {{ c.name }} - {{ c.instructor }} - {{ c.photo }}
        <button @click="edit(c)">Edit</button>
        <button @click="remove(c)">Remove</button>
      </li>
    </ul>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import axios from "redaxios";

export default {
  name: "course",
  setup() {
    const result = ref([]);
    const course = ref({
      id: "",
      name: "",
      instructor: "",
      photo: "",
    });

    const CourseLoad = () => {
      axios.get("http://localhost/api/student").then(({ data }) => {
        console.log(data);
        result.value = data;
      });
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
        .post("http://localhost/api/student", course.value)
        .then(({ data }) => {
          alert("Saved!");
          CourseLoad();
          course.value.name = "";
          course.value.photo = "";
          course.value.instructor = "";
        });
    };

    const edit = (selectedCourse) => {
      course.value = { ...selectedCourse }; // Copying values to avoid reactivity issues
    };

    const updateData = () => {
      const editRecords = `http://localhost/api/student/${course.value.id}`;
      axios.put(editRecords, course.value).then(() => {
        alert("Updated!");
        CourseLoad();
        course.value.name = "";
        course.value.photo = "";
        course.value.instructor = "";
      });
    };

    const remove = (selectedCourse) => {
      const url = `http://localhost/api/student/${selectedCourse.id}`;
      axios.delete(url);
      alert("Deleted!");
      CourseLoad();
    };

    onMounted(() => {
      console.log("mounted() called....");
      CourseLoad();
    });

    return {
      result,
      course,
      CourseLoad,
      save,
      edit,
      updateData,
      remove,
    };
  },
};
</script>
