<template>
     <!-- Popular Home Chef Section Start Here -->
     <section class="popular-chef padding-tb" style="background-color: #fafeff;">
         <div class="container">
             <div class="section-header">
                 <h3>Popular HomeChef</h3>
                 <p>
                     Completely network impactful users whereas next-generation
                     applications engage out thinking via tactical action.
                 </p>
             </div>
             <div class="section-wrapper">
                 <div class="row justify-content-center">
                     <!-- Loop Through Chefs -->
                     <div 
                         class="col-xl-4 col-md-6 col-12" 
                         v-for="(chef, index) in chefs" 
                         :key="index"
                     >
                         <div class="chef-item">
                             <div class="chef-inner">
                                 <div class="chef-thumb">
                                     <img :src="chef.image" :alt="chef.name" />
                                 </div>
                                 <div class="chef-content">
                                     <div class="chef-author">
                                         <a href="#">
                                             <img :src="chef.authorImage" :alt="chef.name" />
                                         </a>
                                     </div>
                                     <h5><a href="#">{{ chef.name }}</a></h5>
                                     <p>{{ chef.title }}</p>
                                     <div class="scocial-share">
                                         <a href="#" class="food-btn"><span><i class="icofont-ui-user"></i> follow</span></a>
                                     </div>
                                     <div class="chef-footer">
                                         <div class="chef-earn chef-con">
                                             <h6>{{ chef.earn }}</h6>
                                             <a href="#">Earned</a>
                                         </div>
                                         <div class="chef-menu chef-con">
                                             <h6>{{ chef.menuCount }}</h6>
                                             <a href="#">Food Menu</a>
                                         </div>
                                         <div class="chef-recipe chef-con">
                                             <h6>{{ chef.recipeCount }}</h6>
                                             <a href="#">Recipe</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </template>
 
 <script>
 export default {
     name: "PopularChef",
     data() {
         return {
             chefs: [
                 {
                     name: "Sanzida laila Trisha",
                     title: "Month Top Homechef",
                     image: "/user/assets/images/chef/01.jpg",
                     authorImage: "/user/assets/images/chef/author/07.jpg",
                     earn: "$290.00",
                     menuCount: 96,
                     recipeCount: 33,
                 },
                 {
                     name: "Jinnat Raihun Sumi",
                     title: "Month Top Homechef",
                     image: "/user/assets/images/chef/02.jpg",
                     authorImage: "/user/assets/images/chef/author/08.jpg",
                     earn: "$290.00",
                     menuCount: 96,
                     recipeCount: 33,
                 },
                 {
                     name: "Shahana Anam Khan",
                     title: "Month Top Homechef",
                     image: "/user/assets/images/chef/03.jpg",
                     authorImage: "/user/assets/images/chef/author/09.jpg",
                     earn: "$290.00",
                     menuCount: 96,
                     recipeCount: 33,
                 },
             ],
         };
     },
 };
 </script>
 
 <style scoped>
 /* Add your custom styles here */
 </style>
 