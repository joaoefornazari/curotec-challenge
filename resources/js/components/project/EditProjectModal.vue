<template>
  <div class="modal-overlay">
    <div class="modal">
      <h2>Edit Project</h2>
      <form @submit.prevent="handleSave">
        <div class="form-group">
          <label for="project-name">Name</label>
          <input id="project-name" v-model="formData.name" type="text" required />
        </div>
        <!-- <div class="form-group">
          <label for="project-category">Category</label>
          <input id="project-category" v-model="formData.category" type="text" required />
        </div> -->
        <div class="modal-actions">
          <button type="submit" class="btn-primary" @click.prevent="handleSave()">SAVE</button>
          <button type="button" class="btn-secondary" @click.prevent="handleClose()">CANCEL</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive, watch } from 'vue'

const { project } = defineProps({
  project: {
    required: true,
  },
})

const formData = reactive({
  name: project.name,
  category: project.category,
})

const $emits = defineEmits(['save', 'close'])

watch(
  () => project,
  (newProject) => {
    formData.name = newProject.name;
  }
)

function handleClose() {
    formData.name = ''

    $emits('close')
}

function handleSave() {
  $emits('save', formData)
}
</script>

<style scoped>
@import '@css/components/project/edit-project-modal.css';
</style>