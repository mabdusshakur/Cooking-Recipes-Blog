<template>
     <!-- Header Section Start -->
     <header class="header-section d-xl-block d-none">
       <div class="container-fluid">
         <div class="header-area">
           <div class="logo">
             <router-link to="/">Cooking & Recipes</router-link>
           </div>
           <div class="main-menu">
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
                 <router-link to="/about">About Us</router-link>
               </li>
             </ul>
           </div>
           <div class="author-option">
             <div class="author-area">
               <div class="author-account">
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
     </header>
   </template>
   
   <script>
   export default {
     name: "Header",
   };
   </script>
   
   <style scoped>
   </style>
   