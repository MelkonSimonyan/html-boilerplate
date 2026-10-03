const htmlEl = document.documentElement;

const hasTouchSupport =
  window.matchMedia("(pointer: coarse)").matches || navigator.maxTouchPoints > 0;

htmlEl.classList.add(hasTouchSupport ? "is-touch" : "no-touch");

const mediaQueries = {
  xxs: "(max-width: 575.98px)",
  xs: "(max-width: 767.98px)",
  sm: "(max-width: 991.98px)",
  md: "(max-width: 1199.98px)",
  lg: "(max-width: 1399.98px)",
  xl: "(min-width: 1400px)",
};
function checkCSSMedia(size) {
  const query = mediaQueries[size];
  return query ? window.matchMedia(query).matches : false;
}

const noScroll = {
  start: () => {
    if (!htmlEl.classList.contains("is-noscroll")) {
      htmlEl.style.setProperty("--scrollbarWidth", window.innerWidth - htmlEl.clientWidth + "px");
      htmlEl.classList.add("is-noscroll");
    }
  },

  finish: () => {
    htmlEl.classList.remove("is-noscroll");
    htmlEl.style.removeProperty("--scrollbarWidth");
  },
};

/* Fancybox Setup */
(function () {
  Fancybox.defaults = {
    ...Fancybox.defaults,
    placeFocusBack: false,
    dragToClose: false,
    closeExisting: true,
    closeButtonTpl: `<button data-fancybox-close class="close-btn"><svg class="icon"><use xlink:href="assets/images/svg-sprite.svg?${ver}#close"></use></svg></button>`,
    on: {
      "Carousel.contentReady": (fancyboxRef, carouselRef, slide) => {
        if (fancyboxRef.isCurrentSlide(slide)) {
          htmlEl.dataset.fancyboxType = slide.type;

          if (
            slide.type == "image" ||
            slide.type == "iframe" ||
            slide.type == "youtube" ||
            slide.type == "vimeo"
          ) {
            htmlEl.classList.add("fancybox-type-image");
          } else if (slide.type == "ajax") {
            construct(slide.el);

            /*
            slide.el.querySelectorAll("script").forEach((script) => {
              script.parentElement.appendChild(script);
            });
            */
          }
        }
      },
      destroy: (fancybox, slide) => {
        delete htmlEl.dataset.fancyboxType;

        htmlEl.classList.remove("fancybox-type-image");
      },
    },
  };

  Fancybox.bind("[data-fancybox]", Fancybox.defaults);
})();

/* jQuery Form Validation Setup */
(function () {
  $.extend($.validator.messages, {
    required: "Обязательное поле",
    remote: "Исправьте это поле",
    email: "Некорректный e-mail",
    url: "Некорректный url",
    date: "Некорректная дата",
    dateISO: "Некорректная дата (ISO)",
    number: "Некорректное число",
    digits: "Cимволы 0-9",
    creditcard: "Некорректный номер карты",
    equalTo: "Не совпадает с предыдущим значением",
    accept: "Недопустимое расширение",
    maxlength: $.validator.format("Максимум {0} символов"),
    minlength: $.validator.format("Минимум {0} символов"),
    rangelength: $.validator.format("Минимум {0} и максимум {1} символов"),
    range: $.validator.format("Допустимо значение между {0} и {1}"),
    max: $.validator.format("Допустимо значение меньше или равное {0}"),
    min: $.validator.format("Допустимо значение больше или равное {0}"),
  });

  $.validator.setDefaults({
    errorPlacement: function (error, element) {
      if ($(element).is(":checkbox") || $(element).is(":radio")) {
        error.insertAfter($(element).closest("label"));
      } else {
        error.insertAfter(element);
      }
    },
  });
})();

/* Form Ajax Send */
async function sendForm(form) {
  htmlEl.classList.add("has-loader");

  try {
    const response = await fetch(form.action, {
      method: "POST",
      body: new FormData(form),
    });

    if (!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }

    const data = await response.json();

    Fancybox.close();

    Fancybox.show(
      [
        {
          src: data.message,
          type: "html",
        },
      ],
      {
        ...Fancybox.defaults,
        closeButton: false,
      },
    );

    form.reset();
  } catch (error) {
    console.error("Form submission failed:", error);
    alert("Не удалось отправить форму. Попробуйте ещё раз.");
  } finally {
    htmlEl.classList.remove("has-loader");
  }
}

(function () {
  document.addEventListener("submit", (e) => {
    if (
      e.target.classList.contains("callback-form") ||
      e.target.classList.contains("vacancy-form")
    ) {
      e.preventDefault();
      sendForm(e.target);
    }
  });
})();

/* Init plugins in container */
function construct(container) {
  /**
   * jQuery Form Validation
   * @see  http://jqueryvalidation.org/validate/
   */
  $(container)
    .find(".js-validation-form")
    .each(function () {
      if (!$(this).data("validator")) {
        $(this).validate({
          submitHandler: function (form) {
            sendForm(form);
          },
        });
      }
    });
}
construct(document);

/* Scroll Direction */
(function () {
  let prevScrollTop = htmlEl.scrollTop;
  let lastScrollTop = prevScrollTop;
  function scrollConstruct() {
    if (!htmlEl.classList.contains("is-noscroll")) {
      const scrollTop = htmlEl.scrollTop;
      if (scrollTop !== prevScrollTop) {
        if (scrollTop > 37) {
          htmlEl.classList.add("is-scrolled");
        } else {
          htmlEl.classList.remove("is-scrolled");
        }

        if (scrollTop > lastScrollTop + 50) {
          htmlEl.classList.add("is-scroll-down");
          htmlEl.classList.remove("is-scroll-up");
          lastScrollTop = scrollTop;
        } else if (scrollTop < lastScrollTop - 50) {
          htmlEl.classList.add("is-scroll-up");
          htmlEl.classList.remove("is-scroll-down");
          lastScrollTop = scrollTop;
        }

        prevScrollTop = scrollTop;
      }
    }
  }

  scrollConstruct();
  window.addEventListener("scroll", scrollConstruct);
})();

/* Menu */
(function () {
  const menuBtn = document.querySelector(".menu-btn");
  if (menuBtn) {
    menuBtn.addEventListener("click", function () {
      noScroll.start();
      htmlEl.classList.add("is-menu-open");
    });
  }

  const menuClose = document.querySelectorAll(".mob-menu__close, .mob-menu__bg");
  menuClose.forEach((btn) => {
    btn.addEventListener("click", () => {
      htmlEl.classList.remove("is-menu-open");
      noScroll.finish();
    });
  });
})();

/* Swiper Sliders */
(function () {
  new Swiper(".schedule-compact .swiper", {
    autoHeight: true,
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: 32,
      },
    },
    pagination: {
      el: ".schedule-compact .swiper-pagination",
      clickable: true,
      dynamicBullets: true,
      dynamicMainBullets: 3,
    },
    navigation: {
      nextEl: ".schedule-compact .swiper-button-next",
      prevEl: ".schedule-compact .swiper-button-prev",
    },
  });

  /* Swiper Video */
  // <video src="assets/video/video-1.mp4" poster="assets/video/video-1-poster.jpg" playsinline muted loop></video>
  const disableOnInteraction = true;
  new Swiper(".main-slider", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    autoplay: {
      delay: 7000,
      disableOnInteraction: disableOnInteraction,
    },
    pagination: {
      el: ".main-slider .swiper-pagination",
      clickable: true,
    },
    on: {
      slideChangeTransitionStart: function () {
        const allVideos = this.el.querySelectorAll("video");
        allVideos.forEach((video) => {
          if (!video.paused) {
            video.pause();
          }
          video.currentTime = 0;
        });
      },
      slideChangeTransitionEnd: function () {
        const activeSlide = this.slides[this.activeIndex];
        const video = activeSlide.querySelector("video");

        if (video) {
          setupVideoEvents(video, this);
          video.currentTime = 0;
          video.play().catch((error) => {
            console.warn("Video autoplay failed:", error);
          });
        }
      },
      init: function () {
        const activeSlide = this.slides[this.activeIndex];
        const video = activeSlide.querySelector("video");

        if (video) {
          setupVideoEvents(video, this);
          video.play().catch((error) => {
            console.warn("Video autoplay failed:", error);
          });
        }
      },
    },
  });

  const videoHandlers = new WeakMap();

  function setupVideoEvents(video, swiperInstance) {
    const existing = videoHandlers.get(video);

    if (existing) {
      video.removeEventListener("play", existing.play);
      video.removeEventListener("ended", existing.ended);
      video.removeEventListener("timeupdate", existing.timeupdate);

      if (disableOnInteraction) {
        video.removeEventListener("pause", handlers.pause);
      }
    }

    const handlers = {
      play: () => {
        swiperInstance.autoplay.stop();
      },
      pause: () => {
        if (video.currentTime < video.duration) {
          swiperInstance.autoplay.start();
        }
      },
      ended: () => {
        swiperInstance.slideNext();
        swiperInstance.autoplay.start();
      },
      timeupdate: () => {
        if (video.duration && video.currentTime >= video.duration - 0.1) {
          video.removeEventListener("timeupdate", handlers.timeupdate);
          swiperInstance.slideNext();
          swiperInstance.autoplay.start();
        }
      },
    };

    video.addEventListener("play", handlers.play);

    if (disableOnInteraction) {
      video.addEventListener("pause", handlers.pause);
    }

    video.addEventListener("ended", handlers.ended);

    if (video.hasAttribute("loop")) {
      video.addEventListener("timeupdate", handlers.timeupdate);
    }

    videoHandlers.set(video, handlers);
  }
  /* ! Swiper Video */
})();
