<!-- MainLayout.vue -->
<template>
  <div>
    <Header />
    <main>
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
            class="collapse navbar-collapse justify-content-end"
            id="navbarNav"
          >
            <ul class="navbar-nav">
              <li class="nav-item">
                <router-link to="/" class="nav-link">Home</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/courses" class="nav-link"
                  >Courses</router-link
                >
              </li>
              <li class="nav-item">
                <router-link to="/courses/new" class="nav-link"
                  >Add New Course</router-link
                >
              </li>
            </ul>
          </div>
        </nav>
      </header>
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from "./Header.vue";
import Footer from "./Footer.vue";

export default {
  name: "MainLayout",
  components: {
    Header,
    Footer,
  },
};
</script>

<style scoped>
/* Add any custom styles here for your layout */
</style>
