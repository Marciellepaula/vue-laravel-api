<script setup>

const courses = ref([]);
const page = ref(1);
const totalPages = ref(null);


const fetchCourses = async () => {
    try {
        const response = await axios.get("http://localhost/api/course", {
            params: { page: page.value }
        });
        courses.value = response.data.data;
        totalPages.value = response.data.last_page;
    } catch (error) {
        console.error('Error fetching courses:', error);
    }
};


const prevPage = () => {
    if (page.value > 1) {
        page.value--;
        fetchCourses();
    }
};

const nextPage = () => {
    if (page.value < totalPages.value) {
        page.value++;
        fetchCourses();
    }
};
</script>
  
<template>
    <div>
        <button @click="prevPage" :disabled="page === 1">Previous</button>
        <span>Page {{ page }} of {{ totalPages }}</span>
        <button @click="nextPage" :disabled="page === totalPages">Next</button>
    </div>
</template>
  