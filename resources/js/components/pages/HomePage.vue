<template>
    <div>
   
      <MobileMenu />
  
      <Header />
  
      <Slider />

  
      <FeaturedRecipe />
    
      <PopularRecipe />

    
      <PopularAuthor />
    
      <NewsLetter />
      
      <Footer />
    
    </div>
  </template>
  
  <script>
  import MobileMenu from "@/components/common/MobileMenu.vue"; 
  import Header from "@/components/common/Header.vue"; 
  import Slider from "@/components/home/Slider.vue"; 
  import FeaturedRecipe from "@/components/home/FeaturedRecipe.vue"; 
  import PopularRecipe from "@/components/home/PopularRecipe.vue"; 
  import PopularAuthor from "@/components/home/PopularAuthor.vue"; 
  import NewsLetter from "@/components/common/NewsLetter.vue"; 
  import Footer from "@/components/common/Footer.vue"; 
  
  export default {
    name: "HomePage",
    components: {
      MobileMenu, 
      Header,
      Slider,
      FeaturedRecipe,
      PopularRecipe,
      PopularAuthor,
      NewsLetter,
      Footer
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
  