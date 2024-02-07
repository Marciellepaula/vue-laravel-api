<template>
  <div>
    <Header />
    <main>
      <slot></slot>
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from "../components/Header.vue";

import Footer from "../components/Footer.vue";

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
