<script setup>
import { ref } from "vue";
import axios from "redaxios";
import { useRouter } from "vue-router";
const router = useRouter();

const form = ref({
  email: null,
  password: null,
});

const login = () => {
  axios
    .post("http://localhost/api/course", form.value)
    .then((response) => {
      User.responseAfterLogin(response);
      Toast.fire({
        icon: "success",
        title: "Signed in Successfully",
      });
      router.push({ name: "home" }); // or, router.push('/home')
    })
    .catch((error) => {
      Toast.fire({
        icon: "warning",
        title: "Email or Password Invalid",
      });
      console.error("Login Error:", error);
    });
};
</script>

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
