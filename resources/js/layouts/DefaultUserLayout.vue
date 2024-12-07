<script setup>
import MobileMenu from "../components/common/MobileMenu.vue";
import Header from "../components/common/Header.vue";
import Footer from "../components/common/Footer.vue";

const loadCSS = (href) => {
  return new Promise((resolve, reject) => {
    const link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = href;
    link.onload = () => resolve();
    link.onerror = () => reject();
    document.head.appendChild(link);
  });
};

const loadJS = (src, isExternal = false) => {
  return new Promise((resolve, reject) => {
    const script = document.createElement("script");
    script.src = src;
    if (isExternal) {
      script.crossOrigin = "anonymous";
    }
    script.onload = () => resolve();
    script.onerror = () => reject();
    document.body.appendChild(script);
  });
};

Promise.all([
  loadCSS("/user/assets/css/animate.css"),
  loadCSS("/user/assets/css/bootstrap.min.css"),
  loadCSS("/user/assets/css/icofont.min.css"),
  loadCSS("/user/assets/css/lightcase.css"),
  loadCSS("/user/assets/css/swiper.min.css"),
  loadCSS("/user/assets/css/style.css"),
]).then(() => {
  return loadJS("/user/assets/js/jquery.js");
}).then(() => {
  return Promise.all([
    loadJS("/user/assets/js/waypoints.min.js"),
    loadJS("/user/assets/js/bootstrap.min.js"),
    loadJS("/user/assets/js/isotope.pkgd.min.js"),
    loadJS("/user/assets/js/wow.min.js"),
    loadJS("/user/assets/js/swiper.min.js"),
    loadJS("/user/assets/js/lightcase.js"),
    loadJS("/user/assets/js/jquery.counterup.min.js"),
    loadJS("/user/assets/js/functions.js"),
  ]);
}).then(() => {
  new Swiper(".featured-swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    centeredSlides: false,
    loop: true,
    autoplay: {
      delay: 1200,
      disableOnInteraction: false,
    },
  });

  new Swiper('.food-slider', {
    slidesPerView: 5,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });

}).catch((error) => {
  console.error("Error loading resources:", error);
});
</script>

<template>
  <div>
    <MobileMenu />
    <Header />
    <router-view></router-view>
    <Footer />
  </div>
</template>

<style scoped></style>
