/* Demo-only script for ui.php. Do not copy to new projects. */

/* Show resolved CSS variable values */
document.querySelectorAll("[data-var]").forEach((el) => {
  el.textContent = getComputedStyle(htmlEl).getPropertyValue(el.dataset.var).trim();
});

/* State badge: current breakpoint + html classes */
(function () {
  const badge = document.getElementById("ui-state");

  function update() {
    const bp = ["xxs", "xs", "sm", "md", "lg", "xl"].find((size) => checkCSSMedia(size));
    badge.textContent = `${bp} · ${window.innerWidth}px · ${htmlEl.className}`;
  }

  new MutationObserver(update).observe(htmlEl, { attributes: true, attributeFilter: ["class"] });
  window.addEventListener("resize", update);
  update();
})();

/* Demo slider */
new Swiper(".ui-slider", {
  loop: true,
  spaceBetween: 20,
  a11y: true,
  keyboard: { enabled: true },
  pagination: { el: ".ui-slider .swiper-pagination", clickable: true },
  navigation: {
    nextEl: ".ui-slider .swiper-button-next",
    prevEl: ".ui-slider .swiper-button-prev",
  },
});

/* Popup from JS */
document.getElementById("ui-popup-js").addEventListener("click", () => {
  Fancybox.show(
    [
      {
        html: '<div class="popup-window"><h2 class="h3">JS popup</h2><p>Fancybox.show() with type: "html".</p></div>',
        type: "html",
      },
    ],
    { ...Fancybox.defaults, closeButton: false },
  );
});

/* Loader */
document.getElementById("ui-loader").addEventListener("click", () => {
  htmlEl.classList.add("has-loader");
  setTimeout(() => htmlEl.classList.remove("has-loader"), 1500);
});

/* noScroll */
document.getElementById("ui-noscroll").addEventListener("click", () => {
  noScroll.start();
  setTimeout(noScroll.finish, 2000);
});

/* Mobile menu */
document.getElementById("ui-menu-open").addEventListener("click", () => {
  if (checkCSSMedia("xs")) {
    document.querySelector(".menu-btn").click();
  } else {
    alert("The menu works at widths below 768px");
  }
});
