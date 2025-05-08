<template>
    <div class="project-area">
        <h2>Projects</h2>
        <div class="project-list">
            <ProjectHeader />
            <div class="project-cards">
                <ProjectCard v-for="project in projects" :key="project.id" :project="project" @save="reloadProjects"/>
            </div>
        </div>
    </div>
</template>

<script setup>
import ProjectHeader from '@/components/project/ProjectHeader.vue'
import ProjectCard from '@/components/project/ProjectCard.vue'
import { useProjects } from '@scripts/composables/project/useProjects.js'

const { projects, loadProjects } = useProjects()

const reloadProjects = async () => {
    await loadProjects()
}
</script>

<style scoped lang="css">
@import '@css/components/project/project-area.css';
</style>
