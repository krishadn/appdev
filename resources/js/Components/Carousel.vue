
<template>
    <swiper
      :effect="'coverflow'"
      :grabCursor="true"
      :centeredSlides="true"
      :slidesPerView="'auto'"
      :coverflowEffect="{
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      }"
      :pagination="true"
      :modules="modules"
      class="mySwiper">

      <swiper-slide><img src="slide1.png" alt="Bus"></swiper-slide>
      <swiper-slide><img src="slide2.png" alt="Bus"></swiper-slide>
      <swiper-slide><img src="slide3.png" alt="Bus"></swiper-slide>
      <swiper-slide><img src="slide4.png" alt="Bus"></swiper-slide>
      <swiper-slide><img src="slide5.png" alt="Bus"></swiper-slide>
      <swiper-slide><img src="slide6.png" alt="Bus"></swiper-slide>
    </swiper>
  </template>
  
  <script>
   // Import Swiper Vue.js components
    import { Swiper, SwiperSlide } from 'swiper/vue';

    // Import Swiper styles
    import 'swiper/css';

    import 'swiper/css/effect-coverflow';
    import 'swiper/css/pagination';

    // import required modules
    import { EffectCoverflow, Pagination } from 'swiper/modules';
  
    export default {
      components: {
        Swiper,
        SwiperSlide,
      },
      setup() {
        return {
          modules: [EffectCoverflow, Pagination],
        };
      },
    };
  </script>

<style>
#app { height: 100% }
html,
body {
  position: center;
  height: 100%;
}

body {
  background: white;
  font-size: 14px;
  color: #000;
  margin: 0;
  padding: 0;
}

.swiper {
  width: 100%;
  padding-top: 50px;
  padding-bottom: 50px;
  margin: auto;
  display: block;
 
}

.swiper-slide {
  /* background-position: center; */
  /* background-size: cover; */
  width: 400px;  /* adjust this value to change the width */ 
  height: 300px; /* adjust this value to change the height */
  
}

.swiper-slide img {
  display: block;
  width: 100%;
  
}

</style>