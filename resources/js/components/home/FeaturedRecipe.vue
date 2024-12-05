<template>
     <div class="container mt-4">
       <div class="section-header">
         <h2>Featured Recipe's</h2>
         <p>
           Completely network impactful users whereas next-generation applications engage out thinking via tactical action.
         </p>
       </div>
       <div class="section-wrapper"></div>
       <div class="swiper featured-swiper">
         <div class="swiper-wrapper">
           <div class="swiper-slide" v-for="recipe in recipes" :key="recipe.id">
             <div class="col-lg-6 col-12">
               <div class="p-food-item style-2">
                 <div class="p-food-inner">
                   <div class="p-food-thumb">
                     <img :src="recipe.image" :alt="recipe.name">
                     <span v-if="recipe.isVegan" class="bg-success" style="padding: 8px 7px 8px 7px; border-radius: 10px; top: 6px; left: 6px;">Vegan</span>
                   </div>
                   <div class="p-food-content">
                     <h6><a :href="`/recipe/${recipe.id}`">{{ recipe.name }}</a></h6>
                     <p>{{ recipe.category }}</p>
                     <div class="p-food-group">
                       <a href="homechef-single.html" class="user icon">
                         <img :src="recipe.chefImage" alt="food-author">
                       </a>
                       <a :href="`/recipe/${recipe.id}`" class="food-btn"><span>View Recipe</span></a>
                     </div>
                     <div class="d-flex gap-2 text-dark justify-content-center">
                       <div class="left">
                         <i class="icofont-stopwatch"></i>
                         {{ recipe.time }} HOUR
                       </div>
                       <div class="vr"></div>
                       <div class="right">
                         <i class="icofont-food-basket"></i>
                         {{ recipe.difficulty }}
                       </div>
                       <div class="vr"></div>
                       <div class="middle">
                         <i class="icofont-spoon-and-fork"></i>
                         {{ recipe.serves }} SERVES
                       </div>
                     </div>
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
     name: 'FeaturedRecipe',
     data() {
       return {
         recipes: [
           {
             id: 1,
             name: 'Veggie Tagliatelle Bolognese',
             category: 'Breakfast',
             image: 'user/assets/images/popular-food/style-2/01.jpg',
             isVegan: true,
             chefImage: 'user/assets/images/chef/author/user/01.jpg',
             time: '1',
             difficulty: 'Hard Prep',
             serves: 4
           },
           {
             id: 2,
             name: 'Veggie Tagliatelle Bolognese',
             category: 'Breakfast',
             image: 'user/assets/images/popular-food/style-2/01.jpg',
             isVegan: true,
             chefImage: 'user/assets/images/chef/author/user/01.jpg',
             time: '1',
             difficulty: 'Hard Prep',
             serves: 4
           },
           {
             id: 3,
             name: 'Veggie Tagliatelle Bolognese',
             category: 'Lunch',
             image: 'user/assets/images/popular-food/style-2/01.jpg',
             isVegan: false,
             chefImage: 'user/assets/images/chef/author/user/01.jpg',
             time: '1',
             difficulty: 'Hard Prep',
             serves: 4
           },
           // Add more recipes here as needed
         ]
       };
     }
   };
   </script>
   
   <style scoped>
   /* Add styles for your component */
   .container {
     margin-top: 4rem;
   }
   .section-header h2 {
     font-size: 2rem;
     font-weight: bold;
   }
   .bg-success {
     background-color: #28a745;
   }
   .food-btn {
     color: #007bff;
   }
   </style>
   