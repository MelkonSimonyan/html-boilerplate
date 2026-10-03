# HTML Boilerplate

A lightweight PHP + vanilla CSS/JS starter for building static-style websites from a design. No build step, no Node, no framework: unzip, open in a browser, start styling.

It ships with a set of **global, ready-to-restyle components** (typography, buttons, forms, popups, scrollbars, mobile menu, loader…) and a **UI Kit page** (`ui.php`) that shows all of them in one place. The intended workflow:

1. Receive a design.
2. Open `ui.php` and restyle the global elements (colors, fonts, headings, buttons, form controls, popups, scrollbars, mobile menu) until the kit matches the design.
3. Only then start building individual pages and components on top of those global styles.

## Features

- **Zero tooling** – plain PHP includes, plain CSS, plain JS. Works on any PHP host (or XAMPP/MAMP/`php -S`).
- **Design tokens** in one place (`assets/css/var.css`): fonts, colors, spacing.
- **Typography** – `h1–h6` / `.h1–.h6` and a `.text` wrapper for rich content (links, lists, tables).
- **Buttons** – `.btn`, `.btn--outline`, `.btn--block`, disabled states.
- **Forms** – inputs, textarea, file input, native `<select>` with customizable picker (progressive enhancement), checkbox / radio, floating labels, error states.
- **AJAX submit** – a `fetch`-based sender that shows the server response in a popup. Works with plain native browser validation (no plugins) – this is the recommended default.
- **Optional validation plugin** – jQuery Validation with a localized message set, for the rare cases where native validation is not enough (see [Forms and validation](#forms-and-validation)).
- **Popups** – Fancybox (inline, image gallery, programmatic).
- **Custom scrollbars** – `.has-scrollbar` (vertical and horizontal), configurable through CSS variables.
- **Mobile menu** – CSS-only animated drawer, toggled by a class on `<html>`.
- **Sliders** – Swiper (with a fade + video slider template in `scripts.js`).
- **Accessible by default** – WCAG AA contrast, landmarks, skip link, focus management (see [Accessibility](#accessibility)).
- **Helpers** – scroll lock without layout shift, page loader, scroll direction classes, touch detection, breakpoint helper.
- **Modern CSS** – nesting, `@starting-style`, `appearance: base-select`, `field-sizing`, `:user-invalid`; all with graceful fallbacks.

## Getting started

Requirements: PHP 7.4+ (only `<?= ?>` includes and `json_encode` are used).

```bash
git clone https://github.com/MelkonSimonyan/html-boilerplate.git
cd html-boilerplate
php -S localhost:8000
```

Then open:

- <http://localhost:8000/ui.php> – the UI Kit
- <http://localhost:8000/index.php> – an empty page template

With XAMPP/MAMP/Laragon, simply put the folder into `htdocs` / `www`.

## Project structure

```
.
├── index.php               # Page template (copy it for every new page)
├── ui.php                  # UI Kit – demo of all global elements
├── blocks/
│   ├── head.php            # <head>: meta, favicons, CSS, jQuery, cache-busting $ver
│   ├── header.php          # Skip link, header, accessible mobile menu
│   ├── footer.php          # Footer
│   ├── foot.php            # Scripts at the end of <body>
│   └── formHandler.php     # Demo endpoint for AJAX forms (returns JSON)
└── assets/
    ├── css/
    │   ├── var.css         # Design tokens (CSS variables)
    │   ├── style.css       # Global styles and components
    │   ├── media.css       # Responsive overrides
    │   └── ui.css          # UI Kit demo only – do not copy to projects
    ├── js/
    │   ├── scripts.js      # Global scripts
    │   └── ui.js           # UI Kit demo only – do not copy to projects
    ├── images/
    │   └── svg-sprite.svg  # SVG icon sprite
    ├── fonts/              # Put web fonts here
    └── lib/                # Third-party libraries (see below)
```

`ui.php`, `ui.css` and `ui.js` are only needed for the demo. Delete them (and the `ui.php` link in `header.php`) once the project's global styles are done, or simply don't ship them.

## Creating a page

```php
<?php $page = 'about';
require 'blocks/head.php'; ?>

<body>
  <?php require 'blocks/header.php'; ?>

  <main class="content" id="main">
    <div class="container">
      <div class="text">
        <h1>About</h1>
        <p>Content…</p>
      </div>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <?php require 'blocks/foot.php'; ?>
</body>

</html>
```

- Keep `id="main"` on the `<main>` element of every page: it is the target of the skip link (`<a class="skip-link" href="#main">`) in `header.php`, which lets keyboard and screen reader users jump past the navigation straight to the content.
- `$page` is used by `header.php` to mark the active menu item (`is-active`).
- `$ver` (set in `head.php`) is appended to local CSS/JS URLs as a cache buster. It is `time()` by default, which is handy in development; replace it with a fixed version in production.

## Styling workflow

| Step | File | What to change |
| --- | --- | --- |
| 1 | `assets/css/var.css` | Fonts, accent / error colors, text colors, backgrounds, borders, `--text-space` |
| 2 | `assets/css/style.css` | Heading sizes, `.btn`, `.form-*`, `.popup-window`, `.has-scrollbar`, mobile menu… |
| 3 | `assets/css/media.css` | Responsive tweaks for the global styles |
| 4 | Page / component CSS | Add new files or sections after the global styles are final |

Breakpoints (same in CSS and JS):

| Name | Query |
| --- | --- |
| `xl` | `min-width: 1400px` |
| `lg` | `max-width: 1399.98px` |
| `md` | `max-width: 1199.98px` |
| `sm` | `max-width: 991.98px` |
| `xs` | `max-width: 767.98px` |
| `xxs` | `max-width: 575.98px` |

## Components cheat sheet

**Typography** – wrap editor content in `.text` to get styled links, lists and tables. Use `.h1–.h6` to apply heading styles to any element.

**Buttons**

```html
<button type="button" class="btn">Button</button>
<a href="#" class="btn btn--outline">Outline</a>
<button type="button" class="btn btn--block">Block</button>
```

**Form controls**

```html
<div class="form-group">
  <label class="form-label" for="name">Name</label>
  <input type="text" class="form-control" id="name" name="name" required>
</div>

<!-- Floating label: input first, label after, placeholder=" " is required -->
<div class="form-group form-floating">
  <input type="text" class="form-control" id="email" placeholder=" ">
  <label class="form-label" for="email">Email</label>
</div>

<!-- Select -->
<select class="form-select">
  <button><selectedcontent></selectedcontent></button>
  <option value="1">Option 1</option>
</select>

<!-- Checkbox / radio -->
<div class="form-check">
  <label>
    <input type="checkbox" name="agree">
    <span class="form-check__btn">
      <span class="form-check__icon"></span>
      <span class="form-check__text">I agree</span>
    </span>
  </label>
</div>
```

### Forms and validation

> **jQuery is included for one reason only: the [jQuery Validation](https://jqueryvalidation.org/) plugin.** Nothing else in the project depends on it. Use the plugin **only as a last resort**, when native browser validation (`required`, `type="email"`, `pattern`, `minlength`, …) is not sufficient. If you do not need it, remove jQuery, `jquery.validate.min.js` and the `$.validator` / `construct()` code from the project.

There are two ready-to-use ways to submit a form via AJAX. **Prefer the first one.**

1. **Native validation + AJAX (no plugins) – recommended.** `<form class="callback-form" action="…">` – the browser validates the fields (`required`, `type`, `pattern`…), then the form is sent with `fetch`. Example: the *AJAX + native browser validation* form in `ui.php`.
2. **jQuery Validation + AJAX – only when really needed.** `<form class="js-validation-form" action="…" novalidate>` – validated by the plugin (custom rules, complex dependencies, custom messages), then sent with `fetch`. Example: the *jQuery Validation + AJAX* form in `ui.php`.

Both share the same sender (`sendForm()`) and server contract:

- The endpoint must return JSON: `{ "success": true, "message": "<html shown in a popup>" }` (see `blocks/formHandler.php`).
- To make another form class use AJAX, add it to the `submit` handler in `scripts.js`.
- Messages for the jQuery Validation plugin are defined in `scripts.js` (`$.validator.messages`) – translate them for your project. Native browser messages follow the user's browser language.

**Popups (Fancybox)**

```html
<button type="button" data-fancybox data-src="#popup">Open</button>

<div id="popup" class="popup-window" style="display: none">
  <h2 class="h3">Title</h2>
  <p>Content</p>
</div>
```

```js
Fancybox.show([{ html: "<div class='popup-window'>…</div>", type: "html" }], {
  ...Fancybox.defaults,
  closeButton: false,
});
```

**Scrollbars**

```html
<div class="has-scrollbar" style="max-height: 300px">…</div>
<div class="has-scrollbar has-scrollbar--direction-x">…</div>
```

Customize with `--scrollbar-track-bg`, `--scrollbar-thumb-bg`, `--scrollbar-size`, `--scrollbar-track-size`, `--scrollbar-thumb-size`.

**Mobile menu** – the burger button (`.menu-btn`) and drawer (`.mob-menu`) are active below 768px. Opening adds `is-menu-open` to `<html>`; edit the markup in `blocks/header.php`.

**Icons** – add `<symbol>` entries to `assets/images/svg-sprite.svg` and use:

```html
<svg class="icon" aria-hidden="true">
  <use xlink:href="assets/images/svg-sprite.svg#close"></use>
</svg>
```

Icon size is controlled with `font-size`, color with `color`.

## JavaScript helpers (`scripts.js`)

| Helper | Description |
| --- | --- |
| `htmlEl` | `document.documentElement` |
| `checkCSSMedia('xs')` | Returns `true` if the named breakpoint matches |
| `noScroll.start()` / `noScroll.finish()` | Locks / unlocks page scroll without layout shift |
| `sendForm(form)` | AJAX form submission with loader and result popup |
| `construct(container)` | Initializes plugins inside a container (call it for dynamically added content) |

Classes toggled on `<html>`:

| Class | Meaning |
| --- | --- |
| `is-touch` / `no-touch` | Touch capability |
| `is-scrolled` | Page scrolled more than 37px |
| `is-scroll-down` / `is-scroll-up` | Last scroll direction |
| `is-noscroll` | Scroll is locked |
| `is-menu-open` | Mobile menu is open |
| `has-loader` | Full-page loader is visible |

## Third-party libraries

Bundled locally in `assets/lib/`:

| Library | Version | License |
| --- | --- | --- |
| [jQuery](https://jquery.com/) (only required by jQuery Validation) | 3.7.1 | MIT |
| [jQuery Validation](https://jqueryvalidation.org/) (optional, last resort) | 1.19.5 | MIT |
| [Swiper](https://swiperjs.com/) | 11.1.14 | MIT |
| [Fancybox](https://fancyapps.com/fancybox/) | 6.1.13 | See [fancyapps.com/license](https://fancyapps.com/license) – a commercial license is required for commercial projects |

## Accessibility

The boilerplate is built to meet **WCAG 2.2 AA** out of the box. What is already handled:

- **Semantic landmarks** – `<header>`, `<nav aria-label="Main">`, `<main id="main">`, `<footer>`, and a **skip link** (`.skip-link`) that appears on keyboard focus.
- **Keyboard support** – a visible focus ring (`:focus-visible`) for links, buttons and custom checkboxes / radios; text fields and selects indicate focus with a border color change instead of an outline (make sure that change stays clearly visible after restyling). The mobile menu opens with focus moved inside, traps `Tab`, closes with `Esc` and returns focus to the burger button.
- **Screen readers** – the burger button exposes `aria-label`, `aria-expanded` and `aria-controls`; the current page link gets `aria-current="page"`; decorative icons are `aria-hidden`; icon-only buttons have `aria-label`; validation errors from jQuery Validation are announced via `role="alert"`; popups use `role="dialog"` with `aria-labelledby`.
- **Color contrast** – default tokens in `var.css` pass AA on white: text ≥ 4.5:1 (`--c-accent`, `--c-error`, `--txt-secondary`) and form control borders ≥ 3:1 (`--border-input`).
- **Reduced motion** – `prefers-reduced-motion` disables transitions and smooth scrolling.
- **Forms** – every control in the kit has a visible `<label>`; `autocomplete` attributes are used in the demo forms; native validation works without JavaScript.
- **Zoom and text size** – no `user-scalable=no`, layout works at 320px width.
- **Sliders** – Swiper's `a11y` module and keyboard control are enabled in the demo slider.

Things to keep in mind when restyling or building pages:

- **Re-check contrast after changing tokens in `var.css`.** The values you get from a design are the most common source of AA failures: text on `--c-accent` buttons, `--txt-secondary` placeholders, error messages, and input borders. Use a checker such as the [WebAIM Contrast Checker](https://webaim.org/resources/contrastchecker/).
- Never remove focus outlines without providing an equally visible replacement.
- Keep **one `<h1>` per page** and do not skip heading levels (the UI Kit page intentionally shows all heading styles, so it is an exception).
- Give every `<img>` a meaningful `alt` (or `alt=""` if decorative) and every icon-only control an `aria-label`.
- Make scrollable regions (`.has-scrollbar`) keyboard accessible with `tabindex="0"`, `role="region"` and an `aria-label`.
- Use real `<button>` elements for actions and `<a href>` for navigation.
- Prefer the native-validation form (`.callback-form`); when using jQuery Validation, keep the labels visible and errors adjacent to their fields.
- Fancybox is configured with `placeFocusBack: false` in `scripts.js`; set it to `true` if you want focus to return to the trigger element after a popup closes.

## Browser support

Evergreen browsers. Newer CSS features (`appearance: base-select`, `field-sizing`, `@starting-style`) are used as progressive enhancement and fall back to standard rendering elsewhere.

## License

Bundled third-party libraries keep their own licenses (see above).
