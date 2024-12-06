<template>
     <div class="sponsor-section">
       <div class="container">
         <div class="section-wrapper">
           <div class="sponsor-slider">
             <div class="swiper-wrapper">
               <div
                 class="swiper-slide"
                 v-for="(sponsor, index) in sponsors"
                 :key="index"
               >
                 <div class="sponsor-item">
                   <div class="sponsor-thumb">
                     <a :href="sponsor.link">
                       <img :src="sponsor.image" :alt="`Sponsor ${index + 1}`" />
                     </a>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </template>
<script>
export default {
  name: "Sponsor",
  data() {
    return {
      sponsors: [
        { image: "user/assets/images/sponsor/01.png", link: "#" },
        { image: "user/assets/images/sponsor/02.png", link: "#" },
        { image: "user/assets/images/sponsor/03.png", link: "#" },
        { image: "user/assets/images/sponsor/04.png", link: "#" },
        { image: "user/assets/images/sponsor/05.png", link: "#" },
      ],
    };
  },
};
</script>
<style scoped>

</style>