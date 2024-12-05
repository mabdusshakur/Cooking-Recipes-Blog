<template>
     <!-- Mobile Menu Start Here -->
     <div class="mobile-menu">
       <nav class="mobile-header d-xl-none">
         <div class="header-logo">
           <router-link to="/">Cooking & Recipes</router-link>
         </div>
         <div class="header-bar">
           <span></span>
           <span></span>
           <span></span>
         </div>
       </nav>
       <nav class="menu">
         <div class="mobile-menu-area d-xl-none">
           <div class="mobile-menu-area-inner scrollbar">
             <div class="mobile-search">
               <input type="text" placeholder="Search Here........." />
               <button type="submit">
                 <i class="icofont-search-2"></i>
               </button>
             </div>
             <ul>
               <li>
                 <router-link class="active" to="/">Home</router-link>
               </li>
               <li>
                 <router-link to="/recipes">Recipes</router-link>
               </li>
               <li>
                 <router-link to="/blogs">Blogs</router-link>
               </li>
               <li>
                 <router-link to="/blog">Blog</router-link>
               </li>
               <li>
                 <router-link to="/about">About Us</router-link>
               </li>
             </ul>
             <div class="author-option">
               <div class="author-area">
                 <div class="author-account m-0 p-0 mt-1">
                   <div class="author-icon">
                    <img :src="`/user/assets/images/chef/author/08.jpg`" alt="author">
               </div>
                   <div class="author-select">
                     <select name="author-select" id="author-select">
                       <option value="1">My Account</option>
                       <option value="2">Log Out</option>
                     </select>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </nav>
     </div>
   </template>
   
   <script>
   export default {
     name: "MobileMenu",
   };
   </script>
   
   <style scoped>
   /* আপনি চাইলে এখানে CSS যোগ করতে পারেন */
   </style>
   