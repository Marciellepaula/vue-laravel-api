<template>
  <header class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light container">
      <router-link to="/" class="navbar-brand">Course Platform</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse btn-primary navbar-collapse justify-content-end"
        id="navbarNav"
      >
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/" class="nav-link">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/courses" class="nav-link">Courses</router-link>
          </li>
          <Logout />
        </ul>
      </div>
    </nav>
  </header>
</template>

<script setup>
import Logout from "./auth/Logout.vue";
import axios from "redaxios";
import { useRouter } from "vue-router";
const router = useRouter();
</script>
