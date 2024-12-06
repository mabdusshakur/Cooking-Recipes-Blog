<template>
     <section class="booking-table padding-tb">
       <div class="shape-1">
         <img :src="shapes.shape1" alt="banner" />
       </div>
    
       <div class="container">
         <div class="section-header">
           <h3>Book an Online Table</h3>
           <p>
             Completely network impactful users whereas next-generation
             applications engage out thinking via tactical action.
           </p>
         </div>
         <div class="section-wrapper">
           <div class="row justify-content-center align-items-center">
             <div class="col-lg-6 col-12">
               <div class="bg-table"></div>
             </div>
             <div class="col-lg-6 col-12">
               <div class="contact-form">
                 <form>
                   <input
                     type="text"
                     v-model="form.name"
                     placeholder="Full Name*"
                     required
                   />
                   <input
                     type="email"
                     v-model="form.email"
                     placeholder="Your Email*"
                     required
                   />
                   <input
                     type="text"
                     v-model="form.number"
                     placeholder="Phone Number"
                     required
                   />
                   <div class="res-tab time-zone">
                     <select v-model="form.time">
                       <option value="" disabled>Select Time</option>
                       <option v-for="time in times" :key="time" :value="time">
                         {{ time }}
                       </option>
                     </select>
                   </div>
                   <div class="res-tab table-zone">
                     <select v-model="form.tableSize">
                       <option value="" disabled>Select Table Size</option>
                       <option v-for="size in tableSizes" :key="size" :value="size">
                         {{ size }}
                       </option>
                     </select>
                   </div>
                   <input type="date" v-model="form.date" required />
                   <textarea v-model="form.message" rows="6" placeholder="Message"></textarea>
                   <button type="button" class="food-btn style-2" @click="logForm">
                     <span>Book a Table</span>
                   </button>
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>
   </template>
   
   <script>
   export default {
     name: "BookingTable",
     data() {
       return {
         shapes: {
           shape1: "/user/assets/images/banner/shape/02.png",
           shape2: "/user/assets/images/banner/shape/02.png",
         },
         form: {
           name: "",
           email: "",
           number: "",
           time: "",
           tableSize: "",
           date: "",
           message: "",
         },
         times: [
           "10:00 AM",
           "11:00 AM",
           "12:00 PM",
           "01:00 PM",
           "02:00 PM",
           "03:00 PM",
           "04:00 PM",
           "05:00 PM",
         ],
         tableSizes: [
           "2F - 3F",
           "2.5F - 3.5F",
           "3F - 4F",
           "3.5F - 4.5F",
           "4F - 5F",
           "4.5F - 5.5F",
           "5F - 6F",
           "5.5F - 6.5F",
         ],
       };
     },
     methods: {
       logForm() {
         console.log("Form Data:", this.form);
         alert("Booking form logged in console!");
         // Reset form after logging
         this.form = {
           name: "",
           email: "",
           number: "",
           time: "",
           tableSize: "",
           date: "",
           message: "",
         };
       },
     },
   };
   </script>
   
   <style>
   /* Add custom styles if needed */
   </style>
   