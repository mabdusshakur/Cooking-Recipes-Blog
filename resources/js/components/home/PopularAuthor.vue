<template>
     <section class="popular-chef padding-tb" style="background-color: #fafeff;">
       <div class="container">
         <div class="section-header">
           <h2>Popular Authors</h2>
           <p>
             Completely network impactful users whereas next-generation applications engage out thinking via tactical action.
           </p>
         </div>
         <div class="section-wrapper">
           <div class="row justify-content-center">
             <div 
               v-for="(author, index) in authors" 
               :key="index" 
               class="col-xl-4 col-md-6 col-12"
             >
               <div class="chef-item">
                 <div class="chef-inner">
                   <div class="chef-thumb">
                     <img :src="author.mainImage" alt="food-chef" />
                   </div>
                   <div class="chef-content">
                     <div class="chef-author">
                       <a :href="author.profileLink">
                         <img :src="author.authorImage" alt="chef-author" />
                       </a>
                     </div>
                     <h5>
                       <a :href="author.profileLink">{{ author.authorName }}</a>
                     </h5>
                     <p>
                       {{ author.authorTitle }} <a :href="author.profileLink">Homechef</a>
                     </p>
                     <div class="scocial-share">
                       <a :href="author.profileLink" class="food-btn">
                         <span>
                           <i class="icofont-ui-user"></i> View Profile
                         </span>
                       </a>
                     </div>
                     <div class="chef-footer">
                       <div class="chef-earn chef-con">
                         <h6>{{ author.stats.recipes }}</h6>
                         <a href="#">Recipes</a>
                       </div>
                       <div class="chef-menu chef-con">
                         <h6>{{ author.stats.blogs }}</h6>
                         <a href="#">Blog</a>
                       </div>
                       <div class="chef-recipe chef-con">
                         <h6>{{ author.stats.reach }}</h6>
                         <a href="#">Reach</a>
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
     name: "PopularAuthor",
     data() {
       return {
         authors: [
           {
             authorImage: "/user/assets/images/chef/author/07.jpg",
             authorName: "Sanzida Laila Trisha",
             authorTitle: "Month Top Homechef",
             profileLink: "#",
             mainImage: "/user/assets/images/chef/01.jpg",
             stats: {
               recipes: 290,
               blogs: 96,
               reach: 33,
             },
           },
           {
             authorImage: "/user/assets/images/chef/author/07.jpg",
             authorName: "Another Author",
             authorTitle: "Week Top Blogger",
             profileLink: "#",
             mainImage: "/user/assets/images/chef/02.jpg",
             stats: {
               recipes: 120,
               blogs: 45,
               reach: 50,
             },
           },
         ],
       };
     },
   };
   </script>
   
   <style scoped>
  
   </style>
   