<template>
    <div class="task-card">
        <h3>{{ task.name }}</h3>
        <span>{{ task.category }}</span>
        <div class="task-card-buttons">
            <button class="btn-primary task-card-button">EDIT</button>
            <button class="btn-danger task-card-button">DELETE</button>
        </div>
    </div>
</template>

<script setup>

</script>

<style lang="css" scoped>
@import '@css/components/task/task-card.css';
</style>