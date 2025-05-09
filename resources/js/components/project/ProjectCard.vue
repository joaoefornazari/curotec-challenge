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
                    <button class="btn-primary project-card-button" @click.stop="openEditModal">EDIT</button>
                    <button class="btn-danger project-card-button" @click.stop="openDeleteModal">DELETE</button>
                </div>
            </div>
            <span class="project-category-span">{{ project.category }}</span>
            <p>Created at: {{ new Date(project.created_at).toLocaleDateString() }}</p>
        </div>
        <TaskList v-if="isExpanded" :project-id="project.id"/>
    </div>
    <EditProjectModal v-if="isEditModalVisible" :project="project" @close="closeEditModal" @save="onSave" />
    <DeleteConfirmationModal v-if="isDeleteModalVisible" @cancel="closeDeleteModal" @confirm="onDelete" />
</template>

<script setup>
import { ref } from 'vue'
import TaskList from '@/components/task/TaskList.vue'
import EditProjectModal from '@/components/project/EditProjectModal.vue'
import DeleteConfirmationModal from '@/components/project/DeleteConfirmationModal.vue'
import { useProjectForm } from '@/scripts/composables/project/useProjectForm.js'

const props = defineProps({
    project: {
        required: true,
    }
})

const $emits = defineEmits(['refresh'])

const { project, save, del } = useProjectForm(props.project);

const isExpanded = ref(false)
const isEditModalVisible = ref(false)
const isDeleteModalVisible = ref(false)

function toggleExpand() {
    isExpanded.value = !isExpanded.value
}

function openEditModal() {
    isEditModalVisible.value = true
}

function closeEditModal() {
    isEditModalVisible.value = false
}

function openDeleteModal() {
    isDeleteModalVisible.value = true
}

function closeDeleteModal() {
    isDeleteModalVisible.value = false
}

async function onSave(updatedProject) {
    await save(updatedProject)
    closeEditModal()
    $emits('refresh')
}

async function onDelete() {
    await del()
    closeDeleteModal()
    $emits('refresh')
}
</script>

<style lang="css" scoped>
@import '@css/components/project/project-card.css';
</style>
