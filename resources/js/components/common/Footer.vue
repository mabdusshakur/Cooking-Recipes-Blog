<template>
     <footer class="footer" style="background: #262522;">
          <div class="container">
               <div class="footer-top p-4">
                    <div class="footer-area text-center">
                         <!-- Social Media Links -->
                         <div class="scocial-media">
                              <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                              <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                              <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                              <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                         </div>

                         <!-- Footer Menu -->
                         <div class="footer-menu">
                              <ul>
                                   <li><router-link to="/">Home</router-link></li>
                                   <li><router-link to="/how-it-works">How it works?</router-link></li>
                                   <li><router-link to="/menus">Menus</router-link></li>
                                   <li><router-link to="/chefs">Chefs</router-link></li>
                                   <li><router-link to="/recipes">Recipes</router-link></li>
                                   <li><router-link to="/contact">Contact</router-link></li>
                              </ul>
                         </div>


                         <!-- Copyright -->
                         <p>
                              &copy; 2021 <a href="#"><span>Mezban</span></a> Design by <a
                                   href="#"><span>FoxCoders</span></a>.
                         </p>
                    </div>
               </div>
          </div>
     </footer>
</template>

<script>
export default {
     name: "Footer",
};
</script>

<style scoped>
.footer {
     color: #fff;
}

.footer .scocial-media a {
     margin: 0 10px;
     color: #fff;
     font-size: 18px;
     transition: color 0.3s ease;
}

.footer .scocial-media a:hover {
     color: #ff6347;
     /* Change this to your desired hover color */
}

.footer-menu ul {
     list-style: none;
     padding: 0;
     margin: 20px 0;
}

.footer-menu ul li {
     display: inline-block;
     margin: 0 10px;
}

.footer-menu ul li a {
     color: #fff;
     text-decoration: none;
     transition: color 0.3s ease;
}

.footer-menu ul li a:hover {
     color: #ff6347;
}

.footer p {
     margin-top: 15px;
     font-size: 14px;
}

.footer p a {
     color: #ff6347;
     text-decoration: none;
}
</style>