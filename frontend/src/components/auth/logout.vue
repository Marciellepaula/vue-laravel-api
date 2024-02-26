<template>
  <button @click="logout">Logout</button>
</template>

<script setup>
import { useRouter } from "vue-router"; // Import useRouter outside of script setup
const router = useRouter();
import { useToast } from "vue-toastification";
const toast = useToast();

const logout = async () => {
  try {
    axios.post("http://localhost/api/logout");
    router.push("/login");
    toast.fire({
      icon: "success",
      title: "Logged out successfully.",
    });
  } catch (error) {
    console.error("Logout Error:", error);
    toast.error("Failed to logout.");
  }
};
</script>
