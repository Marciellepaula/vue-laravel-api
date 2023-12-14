<template>
  <div class="container">
    <h2>Curses</h2>
    <form @submit.prevent="save">
      <div class="form-group">
        <label>Name Curse</label>
        <input
          type="text"
          v-model="curso.name"
          class="form-control"
          placeholder="Name"
        />
      </div>

      <div class="form-group">
        <label>photo</label>
        <input
          type="text"
          v-model="curso.photo"
          class="form-control"
          placeholder="photo"
        />
      </div>
      <div class="form-group">
        <label>instructor</label>
        <input
          type="text"
          v-model="curso.instructor"
          class="form-control"
          placeholder="instructor"
        />
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <h2>Courses</h2>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">Courses</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="course in result" v-bind:key="course.id">
          <td>{{ course.name }}</td>
          <td>
            <button type="button" class="btn btn-warning" @click="edit(course)">
              Edit
            </button>
            <button
              type="button"
              class="btn btn-danger"
              @click="remove(course)"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "redaxios";

export default {
  name: "course",
  data() {
    return {
      result: {},
      course: {
        id: "",
        name: "",
        instructor: "",
        photo: "",
      },
    };
  },
  created() {
    this.CourseLoad();
  },
  mounted() {
    console.log("mounted() called.......");
  },

  methods: {
    CourseLoad() {
      var page = "http://localhost/api/student";
      axios.get(page).then(({ data }) => {
        console.log(data);
        this.result = data;
      });
    },

    save() {
      if (this.course.id == "") {
        this.saveData();
      } else {
        this.updateData();
      }
    },
    saveData() {
      axios
        .post("http://localhost/api/student", this.course)
        .then(({ data }) => {
          alert("saveddddd");
          this.course.Load();
          this.course.name = "";
          (this.course.photo = ""), (this.course.instructor = "");
        });
    },
    edit(course) {
      this.course = course;
    },
    updateData() {
      var editrecords = "http://localhost/api/student/" + this.course.id;
      axios.put(editrecords, this.course).then(({ data }) => {
        this.course.name = "";
        (this.course.photo = ""), (this.instructor.instructor = "");
        alert("Updated!!!");
        this.courseLoad();
      });
    },

    remove(curse) {
      var url = `http://localhost/api/student/${curse.id}`;
      // var url = 'http://127.0.0.1:8000/api/student/'+ student.id;
      axios.delete(url);
      alert("Deleted");
      this.CourseLoad();
    },
  },
};
</script>
