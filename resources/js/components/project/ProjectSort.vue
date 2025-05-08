<template>
    <div class="project-sort-container">
        <h3>Sort projects by:</h3>
        <fieldset>
            <div class="project-sort-field">
                <input type="radio" id="date-radio" name="sort-option" value="date">
                <label for="date-radio">Date</label>
            </div>
            <div class="project-sort-field">
                <input type="radio" id="name-radio" name="sort-option" value="name">
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