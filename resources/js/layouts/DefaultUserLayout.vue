<template>
    <div>
      <h1>Default Layout</h1>
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  export default {
    name: 'DefaultLayout',
    mounted() {
      // Load CSS files
      this.loadCSS('/user/assets/css/animate.css');
      this.loadCSS('/user/assets/css/bootstrap.min.css');
      this.loadCSS('/user/assets/css/icofont.min.css');
      this.loadCSS('/user/assets/css/lightcase.css');
      this.loadCSS('/user/assets/css/swiper.min.css');
      this.loadCSS('/user/assets/css/style.css');
  
      // Load JS files
      this.loadJS('/user/assets/js/jquery.js');
      this.loadJS('/user/assets/js/waypoints.min.js');
      this.loadJS('/user/assets/js/bootstrap.min.js');
      this.loadJS('/user/assets/js/isotope.pkgd.min.js');
      this.loadJS('/user/assets/js/wow.min.js');
      this.loadJS('/user/assets/js/swiper.min.js');
      this.loadJS('/user/assets/js/lightcase.js');
      this.loadJS('/user/assets/js/jquery.counterup.min.js');
      this.loadJS('/user/assets/js/functions.js');
      this.loadJS('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', true);
  
      // Initialize Swiper
      this.initSwiper();
    },
    methods: {
      loadCSS(href) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = href;
        document.head.appendChild(link);
      },
      loadJS(src, isExternal = false) {
        const script = document.createElement('script');
        script.src = src;
        if (isExternal) {
          script.crossOrigin = 'anonymous';
        }
        document.body.appendChild(script);
      },
      initSwiper() {
        const interval = setInterval(() => {
          if (typeof Swiper !== 'undefined') {
            clearInterval(interval);
            new Swiper('.featured-swiper', {
              slidesPerView: 1,
              spaceBetween: 30,
              centeredSlides: false,
              loop: true,
              autoplay: {
                delay: 1200,
                disableOnInteraction: false,
              },
              pagination: {
                el: '.featured-swiper-pagination',
                clickable: true,
              },
            });
          }
        }, 500);
      },
    },
  };
  </script>
  
  <style scoped>
  /* Custom styles (optional) */
  </style>
  