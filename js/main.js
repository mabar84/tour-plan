$(document).ready(function () {
  const hotelSlider = new Swiper(".hotel-slider", {
    loop: true,

    // Navigation arrows
    navigation: {
      nextEl: ".hotel-slider__button--next",
      prevEl: ".hotel-slider__button--prev",
    },

    keyboard: {
      enabled: true,
      onlyInViewport: true,
    },
  });

  const reviewsSlider = new Swiper(".reviews-slider", {
    loop: true,

    // Navigation arrows
    navigation: {
      nextEl: ".reviews-slider__button--next",
      prevEl: ".reviews-slider__button--prev",
    },
  });

  $(".parallax-window").parallax({});

  var menuButton = $(".menu-button");
  menuButton.on("click", function () {
    $(".navbar-bottom").toggleClass("navbar-bottom--visible");
  });

  var modalButton = $("[data-toggle=modal]");
  var closeModalButton = $(".modal__close");
  modalButton.on("click", openModal);
  closeModalButton.on("click", closeModal);

  addEventListener("keydown", (e) => {
    if (e.which == "27") {
      closeModal(e);
    }
  });

  function openModal() {
    var modalOverlay = $(".modal__overlay");
    var modalDialog = $(".modal__dialog");
    modalOverlay.addClass("modal__overlay--visible");
    modalDialog.addClass("modal__dialog--visible");
  }

  function closeModal(event) {
    event.preventDefault();
    var modalOverlay = $(".modal__overlay");
    var modalDialog = $(".modal__dialog");
    modalOverlay.removeClass("modal__overlay--visible");
    modalDialog.removeClass("modal__dialog--visible");
  }

  // Обработка форм

  $(".form").each(function () {
    $(this).validate({
      errorClass: "invalid",

      messages: {
        name: {
          required: "Please specify your name",
          minlength: "At least 2 characters required!",
        },
        phone: {
          required: "Specify your phone number",
          minlength: "Not enough numbers!",
        },
        email: {
          required: "Please specify your email",
          email: "Format: name@domain.com",
        },
        search: {
          required: "Please enter query",
        },
      },
    });
  });
  $(".phone").mask("+7(000) 000-00-00");
  AOS.init();
});
