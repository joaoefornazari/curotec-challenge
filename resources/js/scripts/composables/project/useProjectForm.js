import { ref, reactive, toRaw } from 'vue'
import { saveProject } from '@/scripts/components/project/project-card.js'

export function useProjectForm(initialProject) {
    const project = reactive({
        id: initialProject.id,
        name: initialProject.name,
        category: initialProject.category,
        created_at: new Date(initialProject.created_at)
    })

    const isSaving = ref(false)

    async function save(data) {
        if (!project.id) {
            console.error('Project ID is missing. Cannot save.')
            return
        }

        isSaving.value = true
        try {
            await saveProject({ name: data.name }, project.id)
        } catch (error) {
            console.error(error)
        } finally {
            isSaving.value = false
        }
    }

    return {
        project,
        isSaving,
        save,
    }
}