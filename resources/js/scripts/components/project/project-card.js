import Http from '@/tools/api.js'

export const saveProject = async (formData, projectId) => {
    try {
        return await Http.PUT(`/projects/${projectId}`, {
            name: formData.name,
            category: formData.category
        })
    } catch (error) {
        console.error(error)
    }
}
