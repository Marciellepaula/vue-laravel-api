<template>
  <button @click="increment">Count is: {{ count }}</button>
</template>

<script>
import { ref, onMounted } from "vue";

// Use ref to create reactive state
const count = ref(0);

// Define methods
const increment = () => {
  count.value++;
};

// Use onMounted for lifecycle logic
onMounted(() => {
  console.log(`The initial count is ${count.value}.`);
});

// Expose properties and methods to the template
</script>
