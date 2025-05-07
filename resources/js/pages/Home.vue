<template>
    <div class="home">
        <UserSidemenu />
        <MainPanel />
    </div>
</template>

<script setup>
import UserSidemenu from '@/components/user/UserSidemenu.vue'
import MainPanel from '@/components/dashboard/MainPanel.vue'
</script>

<style scoped lang="css">
@import '@css/pages/home.css';
</style>