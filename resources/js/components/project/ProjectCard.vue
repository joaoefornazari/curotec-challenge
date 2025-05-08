<template>
    <div class="project-card" @click="toggleExpand">
        <div v-if="!isExpanded" class="project-card-header">
            <h3>{{ project.name }}</h3>
            <p>Details</p>
        </div>
        <div v-else class="project-card-details">
            <div class="project-card-header">
                <h3>{{ project.name }}</h3>
                <div class="project-card-buttons">
                    <button class="btn-primary project-card-button" @click.stop="toggleExpand">Edit</button>
                    <button class="btn-danger project-card-button" @click.stop="toggleExpand">Delete</button>
                </div>
            </div>
            <span class="project-category-span">{{ project.category }}</span>
            <p>Created at: {{ new Date(project.created_at).toLocaleDateString() }}</p>
        </div>
        <TaskList v-if="isExpanded" :project-id="project.id"/>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import TaskList from '@/components/task/TaskList.vue'

const { project } = defineProps({
    project: {
        required: true,
    }
})

const isExpanded = ref(false);

function toggleExpand() {
    isExpanded.value = !isExpanded.value;
}
</script>

<style lang="css" scoped>
@import '@css/components/project/project-card.css';
</style>
