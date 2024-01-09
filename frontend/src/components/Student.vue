<template>
  <div class="container">
    <h2>Studednt Registration</h2>
    <form @submit.prevent="save">
      <div class="form-group">
        <label>Student name</label>
        <input
          type="text"
          v-model="student.name"
          class="form-control"
          placeholder="Student name"
        />
      </div>

      <div class="form-group">
        <label>Student Address</label>
        <input
          type="text"
          v-model="student.address"
          class="form-control"
          placeholder="Student Address"
        />
      </div>

      <div class="form-group">
        <label>Phone</label>
        <input
          type="text"
          v-model="student.phone"
          class="form-control"
          placeholder="Phone"
        />
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <h2>Student View</h2>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Student Name</th>
          <th scope="col">Address</th>
          <th scope="col">Phone</th>
          <th scope="col">Option</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="student in result" :key="student.id">
          <td>{{ student.id }}</td>
          <td>{{ student.name }}</td>
          <td>{{ student.address }}</td>
          <td>{{ student.phone }}</td>
          <td>
            <button
              type="button"
              class="btn btn-warning"
              @click="edit(student)"
            >
              Edit
            </button>
            <button
              type="button"
              class="btn btn-danger"
              @click="remove(student)"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "redaxios";

const result = ref([]);
const student = ref({
  id: "",
  name: "",
  address: "",
  phone: "",
});

const studentLoad = () => {
  axios.get("http://localhost/api/student").then(({ data }) => {
    console.log(data);
    result.value = data;
  });
};

const save = () => {
  if (student.value.id === "") {
    saveData();
  } else {
    updateData();
  }
};

const saveData = () => {
  axios.post("http://localhost/api/student", student.value).then(({ data }) => {
    alert("Saved!");
    studentLoad();
    student.value.name = "";
    student.value.address = "";
    student.value.phone = "";
  });
};

const edit = (selectedStudent) => {
  student.value = { ...selectedStudent }; // Copying values to avoid reactivity issues
};

const updateData = () => {
  const editRecords = `http://localhost/api/student/${student.value.id}`;
  axios.put(editRecords, student.value).then(() => {
    alert("Updated!");
    studentLoad();
    student.value.name = "";
    student.value.address = "";
    student.value.phone = "";
  });
};

const remove = (selectedStudent) => {
  const url = `http://localhost/api/student/${selectedStudent.id}`;
  axios.delete(url);
  alert("Deleted!");
  studentLoad();
};

onMounted(() => {
  console.log("mounted() called....");
  studentLoad();
});
</script>
