<template>
    <div class="task-list">
        <TaskCard v-if="tasks.length > 0" v-for="task in tasks" :key="task.id" :task="task" />
        <div v-else class="no-tasks">
            <p>No tasks available</p>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import TaskCard from './TaskCard.vue'
import Http from '@/tools/api.js'

const { projectId } = defineProps({
    projectId: {
        type: Number,
        required: true,
    }
})

const tasks = ref([])

onMounted(async () => {
    try {
        const data = await Http.GET(`/tasks/${projectId}`)
        tasks.value = data
    } catch (error) {
        console.error(error)
    }
})
</script>

<style lang="css" scoped>
@import '@css/components/task/task-list.css';
</style>
