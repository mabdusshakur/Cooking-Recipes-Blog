<template>
     <!-- Popular Food Section Start Here -->
     <section class="popular-foods padding-tb" style="background-color: #fafeff;">
          <div class="container">
               <div class="section-header">
                    <h2>Most Popular Recipes</h2>
                    <p>Completely network impactful users whereas next-generation applications engage out thinking via
                         tactical action.
                    </p>

                    <div class="food-category">
                         <div class="food-box" style="padding: 15px;">
                              <div class="section-wrapper">
                                   <div class="food-slider style-2">
                                        <div class="swiper-wrapper">
                                             <div class="swiper-slide" v-for="slide in slides" :key="slide.id">
                                                  <div class="food-item">
                                                       <div class="food-thumb">
                                                            <a href="#"><img :src="slide.image" :alt="slide.title"></a>
                                                       </div>
                                                       <div class="food-content">
                                                            <a href="#">{{ slide.title }}</a>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                         </div>
                    </div>
               </div>

               <div class="section-wrapper">
                    <div class="row">
                         <!-- Food Items Loop -->
                         <div class="col-xl-4 col-md-6 col-12" v-for="(food, index) in popularFoods" :key="index">
                              <div class="p-food-item">
                                   <div class="p-food-inner">
                                        <div class="p-food-thumb">
                                             <img :src="food.image" :alt="food.name">
                                             <span class="bg-success"
                                                  style="padding: 8px 7px; border-radius: 10px; top: 6px; left: 6px;"
                                                  v-if="food.tag">
                                                  {{ food.tag }}
                                             </span>
                                        </div>
                                        <div class="p-food-content">
                                             <div class="p-food-author">
                                                  <a href="homechef-single.html">
                                                       <img :src="food.authorImage" alt="author-img">
                                                  </a>
                                             </div>
                                             <h6><a href="#">{{ food.name }}</a></h6>
                                             <p>{{ food.category }}</p>
                                             <div class="p-food-group">
                                                  <a href="#" class="food-btn"><span>View Recipe</span></a>
                                             </div>
                                             <div class="d-flex my-2 gap-2 text-dark justify-content-center">
                                                  <div class="left">
                                                       <i class="icofont-stopwatch"></i> {{ food.time }}
                                                  </div>
                                                  <div class="vr"></div>
                                                  <div class="right">
                                                       <i class="icofont-food-basket"></i> {{ food.difficulty }}
                                                  </div>
                                                  <div class="vr"></div>
                                                  <div class="middle">
                                                       <i class="icofont-spoon-and-fork"></i> {{ food.serves }}
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
     name: "PopularRecipe",
     data() {
          return {
               slides: [
                    { id: 1, title: "Breakfast", image: "/user/assets/images/food/style-2/04.png" },
                    { id: 2, title: "Dinner", image: "/user/assets/images/food/style-2/05.png" },
                    { id: 3, title: "Lunch", image: "/user/assets/images/food/style-2/06.png" },
                    { id: 4, title: "Vegan", image: "/user/assets/images/food/style-2/07.png" },
               ],
               popularFoods: [
                    {
                         image: "/user/assets/images/popular-food/01.jpg",
                         name: "Veggie Tagliatelle Bolognese",
                         category: "Lunch",
                         time: "1 HOUR",
                         difficulty: "HARD PREP",
                         serves: "4 SERVES",
                         authorImage: "/user/assets/images/chef/author/home-5/01.jpg",
                         tag: "Vegan",
                    },
                    
               ],
          };
     },
};
</script>

<style scoped>
/* Add your custom styles if needed */
</style>