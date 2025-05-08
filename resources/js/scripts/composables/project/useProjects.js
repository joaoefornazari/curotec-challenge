import { ref, onMounted } from 'vue'
import Http from '@/tools/api.js'

export function useProjects() {
    const projects = ref([])

    const loadProjects = async () => {
        projects.value = []
        const data = await Http.GET('/projects')
        projects.value = data
    }

    onMounted(loadProjects)

    return {
        projects,
        loadProjects
    }
}