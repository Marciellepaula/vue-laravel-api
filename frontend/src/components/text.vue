<template>
    <div>
        <input v-model="user.first_name" type="text">

    </div>
    {{ user.first_name }}{{ user.last_name }}
    {{ fullname }}
    <div>
        <input v-model="user.last_name" type="text">

    </div>
</template>





<script setup>

import { computed, ref } from 'vue';

const user = ref(value{
    first_name: 'jonh',
    last_name: 'snow'


})

const fullname = computed(() => {
    return `${user.value.first_name}`;
})

</script>