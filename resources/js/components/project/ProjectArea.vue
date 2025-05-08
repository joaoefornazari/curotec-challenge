<template>
    <div class="project-area">
        <ProjectHeader />
        <ProjectCard v-for="project in projects" :key="project.id" :project="project" />
    </div>
</template>

<script setup>
import ProjectHeader from '@/components/project/ProjectHeader.vue'
import ProjectCard from '@/components/project/ProjectCard.vue'
</script>

<style scoped lang="css">
@import '@css/components/project/project-area.css';
</style>
