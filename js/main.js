const hotelSwiper = new Swiper(".hotel-slider", {
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: ".hotel-slider__button--next",
    prevEl: ".hotel-slider__button--prev",
  },

  keyboard: {
    enabled: true,
    onlyInViewport: false,
  },
});
