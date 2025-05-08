import { ref, onMounted } from 'vue'
import Http from '@/tools/api.js'

export function useProjects() {
    const projects = ref([])

    onMounted(async () => {
        try {
            const data = await Http.GET('/projects')
            projects.value = data
        } catch (error) {
            console.error(error)
        }
    })

    return {
        projects
    }
}