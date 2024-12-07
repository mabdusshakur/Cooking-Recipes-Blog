<script setup>
import MobileMenu from "../../components/common/MobileMenu.vue";
import Header from "../../components/common/Header.vue";
import Slider from "../../components/home/Slider.vue";
import FeaturedRecipe from "../../components/home/FeaturedRecipe.vue";
import PopularRecipe from "../../components/home/PopularRecipe.vue";
import PopularAuthor from "../../components/home/PopularAuthor.vue";
import NewsLetter from "../../components/common/NewsLetter.vue";
import Footer from "../../components/common/Footer.vue";
</script>

<template>
  <div>
    <Slider />
    <FeaturedRecipe />
    <PopularRecipe />
    <PopularAuthor />
    <NewsLetter />
  </div>
</template>


<style scoped></style>