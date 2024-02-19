<template>
  <div>
    <input type="email" v-model="email" placeholder="Email" />
    <input type="password" v-model="password" placeholder="Password" />
    <button @click="login">Login</button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post("/api/login", {
          email: this.email,
          password: this.password,
        });

        const { token, name } = response.data.data;
        localStorage.setItem("token", token);
        localStorage.setItem("name", name);

        // Redirect or show success message
      } catch (error) {
        console.error(error);
        // Show error message to the user
      }
    },
  },
};
</script>
