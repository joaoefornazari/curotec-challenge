<template>
    <div class="project-sort-container">
        <h3>Sort projects by:</h3>
        <fieldset>
            <div class="project-sort-field">
                <input type="radio" name="date-radio">
                <label for="date-radio">Date</label>
            </div>
            <div class="project-sort-field">
                <input type="radio" name="name-radio">
                <label for="name-radio">Name</label>
            </div>
        </fieldset>
</div>
</template>

<script setup>

</script>

<style lang="css" scoped>
@import '@css/components/project/project-sort.css';
</style>