<script setup>
import MobileMenu from "../components/common/MobileMenu.vue";
import Header from "../components/common/Header.vue";
import Footer from "../components/common/Footer.vue";
</script>

<template>
  <div>
    <MobileMenu />
    <Header />
    <router-view></router-view>
    <Footer />
  </div>
</template>

<style scoped></style>
