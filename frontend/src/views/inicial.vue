<template>
  <div id="app">
    <header class="bg-light">
      <router-link to="/login" class="navbar-brand">Login</router-link>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Plataforma de Curso</a>
        <button class="navbar-toggler" type="button" @click="toggleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" :class="{ show: isNavbarOpen }">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Aprenda algo novo hoje</h1>
        <p class="lead text-muted">
          Explore nossa vasta coleção de cursos online em uma variedade de
          tópicos.
        </p>
        <p>
          <a href="#" class="btn btn-primary my-2">Ver Cursos</a>
          <router-link class="btn btn-secondary my-2" to="/register"
            >Comece uma Avaliação Gratuita</router-link
          >
        </p>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-4" v-for="feature in features" :key="feature.id">
            <div class="card mb-4 shadow-sm feature-card">
              <div class="card-body">
                <h4 class="card-title">{{ feature.title }}</h4>
                <p class="card-text">{{ feature.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const isNavbarOpen = ref(false);
    const features = [
      {
        id: 1,
        title: "Cursos de Alta Qualidade",
        description:
          "Tenha acesso a cursos desenvolvidos por especialistas em seus campos.",
      },
      {
        id: 2,
        title: "Acesso 24/7",
        description:
          "Acesse seus cursos a qualquer momento e de qualquer lugar.",
      },
      {
        id: 3,
        title: "Suporte Personalizado",
        description:
          "Nossa equipe de suporte está disponível para ajudá-lo sempre que precisar.",
      },
    ];

    const toggleNavbar = () => {
      isNavbarOpen.value = !isNavbarOpen.value;
    };

    return { isNavbarOpen, features, toggleNavbar };
  },
};
</script>

<style scoped>
/* Custom CSS */
body {
  padding-top: 60px; /* Adjust for fixed navbar */
}
header {
  padding: 10px 0;
}
.jumbotron {
  margin-bottom: 0;
}
.feature-card {
  min-height: 200px; /* Ensure cards have consistent height */
}
</style>
