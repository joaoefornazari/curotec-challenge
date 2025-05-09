<template>
  <div class="modal-overlay">
    <div class="modal">
      <h2>Are you sure?</h2>
      <p class="danger-text"><b>This action is irreversible!</b></p>
      <div class="modal-actions">
        <button type="button" class="btn-danger modal-button" @click.prevent="$emit('confirm')">YES</button>
        <button type="button" class="btn-secondary modal-button" @click.prevent="$emit('cancel')">NO</button>
      </div>
    </div>
  </div>
</template>

<script setup>
const $emits = defineEmits(['confirm', 'cancel'])
</script>

<style scoped>
@import '@css/components/project/project-modal.css';
</style>