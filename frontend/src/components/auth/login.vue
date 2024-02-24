<style></style>

<template>
  <div>
    <div class="container">
      <div class="row justify-content-left">
        <div class="">
          <div class="card shadow-lg border-primary rounded-lg mt-5">
            <div class="card-header">
              <h3 class="text-center text-primary font-weight-bold my-3">
                Login
              </h3>
            </div>
            <div class="card-body">
              <form @submit.prevent="login">
                <div class="form-group">
                  <label class="mb-1" for="inputEmailAddress">Email</label>
                  <input
                    class="form-control py-4"
                    id="inputEmailAddress"
                    type="email"
                    placeholder="Enter Email Address"
                    v-model="form.email"
                  />
                </div>

                <div class="form-group">
                  <label class="mb-1" for="inputPassword">Password</label>
                  <input
                    class="form-control py-4"
                    id="inputPassword"
                    type="password"
                    v-model="form.password"
                    placeholder="Enter Password"
                  />
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input
                      class="custom-control-input"
                      id="rememberPasswordCheck"
                      type="checkbox"
                    />
                    <label
                      class="custom-control-label"
                      for="rememberPasswordCheck"
                      >Remember password</label
                    >
                  </div>
                </div>
                <div
                  class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"
                >
                  <router-link to="/forget">Forgot Password?</router-link>
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center">
              <div class="">
                <router-link to="/register"
                  >Need an account? Sign up!</router-link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
import axios from "redaxios"; // Using regular Axios
import { useRouter } from "vue-router";
import { createWebHistory } from "vue-router";
// Import your Home component

const router = useRouter();

const form = ref({
  email: "",
  password: "",
});

const login = () => {
  axios
    .post("http://localhost/api/login", form.value) // Correct endpoint for login
    .then((response) => {
      if (response.data && response.data.success) {
        const token = response.data.token; // Assuming the token is returned in the response
        localStorage.setItem("token", token);
        router.push("/");
      } else {
        console.error("Login Error:", response.data.message);
      }
    })
    .catch((error) => {
      // Handle network errors or other issues that may occur during the request
      console.error("Login Error:", error);
    });
};
</script>
