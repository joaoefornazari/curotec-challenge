import { ref, reactive } from 'vue'
import { saveProject, deleteProject } from '@/scripts/api/project.js'

export function useProjectForm(initialProject) {
    const project = reactive({
        id: initialProject.id,
        name: initialProject.name,
        category: initialProject.category,
        created_at: new Date(initialProject.created_at)
    })

    const requestHappening = ref(false)

    async function save(data) {
        if (!project.id) {
            console.error('Project ID is missing. Cannot save.')
            return
        }

        requestHappening.value = true
        try {
            await saveProject({ name: data.name }, project.id)
        } catch (error) {
            console.error(error)
        } finally {
            requestHappening.value = false
        }
    }

    async function del() {
        if (!project.id) {
            console.error('Project ID is missing. Cannot delete.')
            return
        }

        requestHappening.value = true
        try {
            await deleteProject(project.id)
        } catch (error) {
            console.error(error)
        } finally {
            requestHappening.value = false
        }
    }

    return {
        project,
        requestHappening,
        save,
        del,
    }
}