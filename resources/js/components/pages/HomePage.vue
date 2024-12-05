<template>
    <div>
      <!-- Mobile Menu -->
      <MobileMenu />
  
      <!-- Header -->
      <Header />
  
      <!-- Slider -->
      <Slider />

      <!-- FeaturedRecipe -->
  
      <FeaturedRecipe />
    
  
    
    </div>
  </template>
  
  <script>
  import MobileMenu from "@/components/common/MobileMenu.vue"; 
  import Header from "@/components/common/Header.vue"; 
  import Slider from "@/components/home/Slider.vue"; 
  import FeaturedRecipe from "@/components/home/FeaturedRecipe.vue"; 
  
  export default {
    name: "HomePage",
    components: {
      MobileMenu, 
      Header,
      Slider,
      FeaturedRecipe,
    },
    methods: {
      goToAbout() {
        this.$router.push("/about"); 
      },
    },
  };
  </script>
  
  <style scoped>
  
  </style>
  