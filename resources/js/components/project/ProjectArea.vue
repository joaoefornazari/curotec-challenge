<template>
    <div class="project-area">
        <h2>Projects</h2>
        <div class="project-list">
            <ProjectHeader />
            <div class="project-cards">
                <ProjectCard v-for="project in projects" :key="project.id" :project="project" />
            </div>
        </div>
    </div>
</template>

<script setup>
import ProjectHeader from '@/components/project/ProjectHeader.vue'
import ProjectCard from '@/components/project/ProjectCard.vue'

import { ref, onMounted } from 'vue'
import Http from '@/tools/api.js'

const projects = ref([])

onMounted(async () => {
    try {
        const data = await Http.GET('/projects')
        projects.value = data
    } catch (error) {
        console.error(error)
    }
})
</script>

<style scoped lang="css">
@import '@css/components/project/project-area.css';
</style>
