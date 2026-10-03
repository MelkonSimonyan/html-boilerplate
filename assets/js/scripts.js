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
    closeButtonTpl: `
    <button data-fancybox-close class="close-btn" aria-label="Close popup">
      <svg class="icon" aria-hidden="true">
        <use xlink:href="assets/images/svg-sprite.svg?${ver}#close"></use>
      </svg>
    </button>
    `,
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
    required: "This field is required",
    remote: "Please fix this field",
    email: "Please enter a valid email address",
    url: "Please enter a valid URL",
    date: "Please enter a valid date",
    dateISO: "Please enter a valid date (ISO)",
    number: "Please enter a valid number",
    digits: "Digits only (0-9)",
    creditcard: "Please enter a valid card number",
    equalTo: "Values do not match",
    accept: "Invalid file extension",
    maxlength: $.validator.format("Maximum {0} characters"),
    minlength: $.validator.format("Minimum {0} characters"),
    rangelength: $.validator.format("Minimum {0} and maximum {1} characters"),
    range: $.validator.format("Value must be between {0} and {1}"),
    max: $.validator.format("Value must be less than or equal to {0}"),
    min: $.validator.format("Value must be greater than or equal to {0}"),
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
          html: data.message,
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
    alert("Failed to send the form. Please try again.");
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
  const menu = document.querySelector(".mob-menu__inner");
  if (!menuBtn || !menu) return;

  const closeBtn = menu.querySelector(".mob-menu__close");
  const focusableSelector =
    "a[href], button:not([disabled]), input, select, textarea, [tabindex]:not([tabindex='-1'])";

  function openMenu() {
    noScroll.start();
    htmlEl.classList.add("is-menu-open");
    menuBtn.setAttribute("aria-expanded", "true");
    if (closeBtn) closeBtn.focus();
  }

  function closeMenu() {
    htmlEl.classList.remove("is-menu-open");
    menuBtn.setAttribute("aria-expanded", "false");
    noScroll.finish();
    menuBtn.focus();
  }

  menuBtn.addEventListener("click", openMenu);

  document.querySelectorAll(".mob-menu__close, .mob-menu__bg").forEach((btn) => {
    btn.addEventListener("click", closeMenu);
  });

  document.addEventListener("keydown", (e) => {
    if (!htmlEl.classList.contains("is-menu-open")) return;

    if (e.key === "Escape") {
      closeMenu();
    } else if (e.key === "Tab") {
      // Keep keyboard focus inside the open menu
      const items = menu.querySelectorAll(focusableSelector);
      const first = items[0];
      const last = items[items.length - 1];
      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    }
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
