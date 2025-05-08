<template>
    <div class="project-header">
        <h2>Projects</h2>
        <div class="project-util-bars">
            <ProjectSearch />
            <ProjectSort />
        </div>
    </div>
</template>

<script setup>
import ProjectSearch from '@/components/project/ProjectSearch.vue'
import ProjectSort from '@/components/project/ProjectSort.vue'
</script>

<style lang="css" scoped>
@import '@css/components/project/project-header.css';
</style>