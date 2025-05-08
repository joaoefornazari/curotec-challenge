<template>
    <div class="task-list">
        <TaskCard v-for="task in tasks" :key="task.id" :task="task" />
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
