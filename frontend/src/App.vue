<template>
  <div>
    <div>
      <input v-model="user.first_name" type="text">
    </div>

    <!-- ... other code ... -->

  </div>
</template>





<script setup>

import { computed, ref } from 'vue';

const user = ref(value: {
  first_name: 'jonh',
  last_name: 'snow'
})

const fullname = computed(getter: () => {
  return `${user.value.first_name}`;
})


const total = computed(get: () => products.reduce)
</script>