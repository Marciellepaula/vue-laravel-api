<template>
  <div>
    <Header />
    <main>
      <slot></slot>
    </main>
    <Footer />
  </div>
</template>

<script setup>
import { onMounted, defineComponent } from "vue";
import { useRouter } from "vue-router";
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";

const router = useRouter();

onMounted(() => {
  const token = localStorage.getItem("token");
  console.log(token);
  if (!token) {
    console.error("Token not found in localStorage");
    router.push("/login");
  }
});
</script>
<script>
defineComponent({
  name: "MainLayout",
  components: {
    Header,
    Footer,
  },
});
</script>
<style scoped>
/* Add any custom styles here for your layout */
</style>
