<?php $page = 'ui';
require 'blocks/head.php';

/* Placeholder image (data URI) so the kit has no external dependencies */
function ui_img($w, $h, $label, $color = '#1ab394')
{
  $svg = "<svg xmlns='http://www.w3.org/2000/svg' width='$w' height='$h' viewBox='0 0 $w $h'><rect width='100%' height='100%' fill='$color'/><text x='50%' y='50%' fill='#fff' font-family='sans-serif' font-size='" . round($w / 12) . "' text-anchor='middle' dominant-baseline='middle'>$label</text></svg>";
  return 'data:image/svg+xml,' . rawurlencode($svg);
}

$lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam feugiat tincidunt urna id efficitur. Pellentesque ut urna at ligula vestibulum posuere sed et turpis. Mauris vitae ultricies sapien, et scelerisque mi. Aliquam gravida interdum cursus. Integer massa ante, tempus sit amet venenatis sit amet, fermentum nec risus.';
?>

<body>
  <link href="assets/css/ui.css?<?= $ver; ?>" rel="stylesheet" />

  <?php require 'blocks/header.php'; ?>

  <main class="content" id="main">
    <div class="container">

      <div class="ui-intro">
        <h1>UI Kit</h1>
        <p class="ui-note">Demo of the global styles and scripts. This page uses only <code>var.css</code>, <code>style.css</code>, <code>media.css</code> and <code>scripts.js</code>; <code>ui.css</code> / <code>ui.js</code> exist only for this demo and are not meant to be copied into projects.</p>
        <nav class="ui-nav">
          <a href="#colors">Colors and variables</a>
          <a href="#typography">Typography</a>
          <a href="#links">Links</a>
          <a href="#lists">Lists</a>
          <a href="#tables">Tables</a>
          <a href="#media">Images</a>
          <a href="#buttons">Buttons</a>
          <a href="#forms">Form elements</a>
          <a href="#validation">Validation and submission</a>
          <a href="#popups">Popups</a>
          <a href="#scrollbars">Scrollbars</a>
          <a href="#slider">Slider</a>
          <a href="#menu">Mobile menu</a>
          <a href="#states">States and utilities</a>
        </nav>
      </div>

      <!-- Colors -->
      <section class="ui-section" id="colors">
        <h2 class="ui-title">Colors and variables <span>var.css</span></h2>
        <div class="ui-swatches">
          <?php foreach (['--c-accent', '--c-accent2', '--c-error', '--txt-primary', '--txt-secondary', '--bg-primary', '--border-primary'] as $var) : ?>
            <div class="ui-swatch">
              <div class="ui-swatch__color" style="background: var(<?= $var; ?>)"></div>
              <div class="ui-swatch__name"><?= $var; ?></div>
              <div class="ui-swatch__value" data-var="<?= $var; ?>"></div>
            </div>
          <?php endforeach; ?>
        </div>
        <p class="ui-note">
          <code>--font-main</code>: <span data-var="--font-main"></span><br>
          <code>--text-space</code> (spacing between text blocks): <span data-var="--text-space"></span>
        </p>
      </section>

      <!-- Typography -->
      <section class="ui-section" id="typography">
        <h2 class="ui-title">Typography <span>h1–h6, .h1–.h6, .text</span></h2>

        <div class="ui-subtitle">Headings (outside .text)</div>
        <h1>Heading H1</h1>
        <h2>Heading H2</h2>
        <h3>Heading H3</h3>
        <h4>Heading H4</h4>
        <h5>Heading H5</h5>
        <h6>Heading H6</h6>
        <div class="h1">Class .h1 on a div</div>
        <div class="h3">Class .h3 on a div</div>

        <div class="ui-subtitle">Rich text content (.text)</div>
        <div class="text">
          <h1>Heading H1 <a href="#typography">with a link</a></h1>
          <p><?= $lorem; ?> <strong>Bold</strong>, <em>italic</em>, <u>underlined</u>, <del>deleted</del>, <abbr title="Tooltip">abbr</abbr>, <a href="#typography">link in text</a>, <a href="tel:+10000000000">+1 000 000 00 00</a>, <a href="mailto:mail@example.com">mail@example.com</a>.</p>
          <h2>Heading H2</h2>
          <p><?= $lorem; ?></p>
          <h3>Heading H3</h3>
          <p><?= $lorem; ?></p>
          <h4>Heading H4</h4>
          <p><?= $lorem; ?></p>
          <h5>Heading H5</h5>
          <p><?= $lorem; ?></p>
          <h6>Heading H6</h6>
          <p><?= $lorem; ?></p>
          <blockquote>Blockquote: <?= $lorem; ?></blockquote>
          <pre>pre: &lt;div class="text"&gt;...&lt;/div&gt;</pre>
          <hr>
          <p>Text after <code>hr</code>.</p>
        </div>
      </section>

      <!-- Links -->
      <section class="ui-section" id="links">
        <h2 class="ui-title">Links <span>a, .text a</span></h2>
        <p><a href="#links">Plain link (inherits color, no underline)</a></p>
        <div class="text">
          <p><a href="#links">Link inside .text</a> — accent color, underline, hover/active states.</p>
        </div>
        <p>
          <a href="tel:+10000000000">tel: link</a> ·
          <a href="mailto:mail@example.com">mailto: link</a> ·
          <button type="button" class="ui-focus-demo">Focus: press Tab</button>
        </p>
      </section>

      <!-- Lists -->
      <section class="ui-section" id="lists">
        <h2 class="ui-title">Lists <span>.text ul / ol</span></h2>
        <div class="text">
          <ul>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Nullam feugiat tincidunt urna
              <ul>
                <li>Nested item</li>
                <li>Nested item
                  <ul>
                    <li>Third level</li>
                    <li>Third level</li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>Pellentesque ut urna at ligula</li>
          </ul>

          <ol>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Nullam feugiat tincidunt urna
              <ol>
                <li>Nested item</li>
                <li>Nested item</li>
              </ol>
            </li>
            <li>Pellentesque ut urna at ligula</li>
          </ol>
        </div>
      </section>

      <!-- Tables -->
      <section class="ui-section" id="tables">
        <h2 class="ui-title">Tables <span>.table, .table-wrapper, .text table</span></h2>
        <div class="table-wrapper">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Title 1</th>
                <th scope="col">Title 2</th>
                <th scope="col">Title 3</th>
                <th scope="col">Title 4</th>
                <th scope="col">Title 5</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < 3; $i++) : ?>
                <tr>
                  <td>Lorem ipsum dolor sit amet</td>
                  <td>Nullam feugiat tincidunt urna</td>
                  <td>Pellentesque ut urna at ligula</td>
                  <td>Mauris vitae ultricies sapien</td>
                  <td>Aliquam gravida interdum cursus</td>
                </tr>
              <?php endfor; ?>
            </tbody>
          </table>
        </div>
        <p class="ui-note">Below 768px a table without <code>.table-wrapper</code> becomes horizontally scrollable on its own.</p>
      </section>

      <!-- Media -->
      <section class="ui-section" id="media">
        <h2 class="ui-title">Images and icons <span>img, .icon</span></h2>
        <p><img src="<?= ui_img(800, 300, 'img 800x300'); ?>" width="800" height="300" alt="Placeholder"></p>
        <div class="ui-row">
          <svg class="icon" aria-hidden="true" style="font-size: 16px">
            <use xlink:href="assets/images/svg-sprite.svg?<?= $ver; ?>#close"></use>
          </svg>
          <svg class="icon" aria-hidden="true" style="font-size: 24px">
            <use xlink:href="assets/images/svg-sprite.svg?<?= $ver; ?>#close"></use>
          </svg>
          <svg class="icon" aria-hidden="true" style="font-size: 40px; color: var(--c-accent)">
            <use xlink:href="assets/images/svg-sprite.svg?<?= $ver; ?>#close"></use>
          </svg>
          <span class="ui-note">SVG sprite; size via <code>font-size</code>, color via <code>currentColor</code></span>
        </div>
        <div class="ui-row">
          <button type="button" class="close-btn" aria-label="Close menu">
            <svg class="icon" aria-hidden="true">
              <use xlink:href="assets/images/svg-sprite.svg?<?= $ver; ?>#close"></use>
            </svg>
          </button>
          <span class="ui-note"><code>.close-btn</code></span>
        </div>
      </section>

      <!-- Buttons -->
      <section class="ui-section" id="buttons">
        <h2 class="ui-title">Buttons <span>.btn, .btn--outline, .btn--block</span></h2>
        <div class="ui-row">
          <button type="button" class="btn">Button</button>
          <a href="#buttons" class="btn">Link .btn</a>
          <button type="button" class="btn btn--outline">Outline</button>
          <a href="#buttons" class="btn btn--outline">Link outline</a>
        </div>
        <div class="ui-row">
          <button type="button" class="btn" disabled>Disabled</button>
          <button type="button" class="btn btn--outline" disabled>Disabled outline</button>
          <a href="#buttons" class="btn is-disabled" aria-disabled="true" tabindex="-1">.is-disabled</a>
          <button type="button" class="btn">
            <svg class="icon" aria-hidden="true">
              <use xlink:href="assets/images/svg-sprite.svg?<?= $ver; ?>#close"></use>
            </svg>
            With icon
          </button>
        </div>
        <div class="ui-demo ui-demo--narrow">
          <button type="button" class="btn btn--block">Block</button>
          <br><br>
          <button type="button" class="btn btn--outline btn--block">Block outline</button>
        </div>
      </section>

      <!-- Forms -->
      <section class="ui-section" id="forms">
        <h2 class="ui-title">Form elements <span>.form-group, .form-control, .form-select, .form-check, .form-floating</span></h2>

        <div class="ui-cols">
          <form action="#" onsubmit="return false">
            <div class="ui-subtitle">Default</div>
            <div class="form-group">
              <label class="form-label" for="f-text">Text input</label>
              <input type="text" class="form-control" id="f-text" placeholder="Placeholder">
            </div>
            <div class="form-group">
              <label class="form-label" for="f-email">Email</label>
              <input type="email" class="form-control" id="f-email" placeholder="mail@example.com">
            </div>
            <div class="form-group">
              <label class="form-label" for="f-tel">Phone</label>
              <input type="tel" class="form-control" id="f-tel" placeholder="+1 000 000 00 00">
            </div>
            <div class="form-group">
              <label class="form-label" for="f-pass">Password</label>
              <input type="password" class="form-control" id="f-pass" value="password">
            </div>
            <div class="form-group">
              <label class="form-label" for="f-num">Number</label>
              <input type="number" class="form-control" id="f-num" value="5">
            </div>
            <div class="form-group">
              <label class="form-label" for="f-date">Date</label>
              <input type="date" class="form-control" id="f-date">
            </div>
            <div class="form-group">
              <label class="form-label" for="f-textarea">Textarea</label>
              <textarea class="form-control" id="f-textarea" rows="5" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <label class="form-label" for="f-select">Select</label>
              <select class="form-select" id="f-select">
                <button>
                  <selectedcontent></selectedcontent>
                </button>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3 with a very long title that does not fit in one line</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label" for="f-file">File</label>
              <input type="file" class="form-control" id="f-file">
            </div>
          </form>

          <form action="#" onsubmit="return false">
            <div class="ui-subtitle">Floating label</div>
            <div class="form-group form-floating">
              <input type="text" class="form-control" id="ff-text" placeholder=" ">
              <label class="form-label" for="ff-text">Name</label>
            </div>
            <div class="form-group form-floating">
              <input type="email" class="form-control" id="ff-email" placeholder=" " value="mail@example.com">
              <label class="form-label" for="ff-email">Email (filled)</label>
            </div>
            <div class="form-group form-floating">
              <textarea class="form-control" id="ff-textarea" rows="5" placeholder=" "></textarea>
              <label class="form-label" for="ff-textarea">Message</label>
            </div>
            <div class="form-group form-floating">
              <select class="form-select" id="ff-select" required>
                <button>
                  <selectedcontent></selectedcontent>
                </button>
                <option value=""></option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
              </select>
              <label class="form-label" for="ff-select">Select (requires required and an empty option)</label>
            </div>

            <div class="ui-subtitle">States</div>
            <div class="form-group">
              <input type="text" class="form-control" value="Disabled" disabled>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" value="Readonly" readonly>
            </div>
            <div class="form-group">
              <input type="text" class="form-control error" value="Error (.error)">
            </div>
            <div class="form-group">
              <select class="form-select" disabled>
                <button>
                  <selectedcontent></selectedcontent>
                </button>
                <option>Disabled select</option>
              </select>
            </div>

            <div class="ui-subtitle">Checkbox / Radio</div>
            <div class="form-check">
              <label>
                <input type="checkbox" name="c1">
                <span class="form-check__btn"><span class="form-check__icon"></span><span class="form-check__text">Checkbox</span></span>
              </label>
            </div>
            <div class="form-check">
              <label>
                <input type="checkbox" name="c2" checked>
                <span class="form-check__btn"><span class="form-check__icon"></span><span class="form-check__text">Checkbox checked</span></span>
              </label>
            </div>
            <div class="form-check">
              <label>
                <input type="checkbox" name="c3" disabled>
                <span class="form-check__btn"><span class="form-check__icon"></span><span class="form-check__text">Checkbox disabled</span></span>
              </label>
            </div>
            <div class="form-check">
              <label>
                <input type="radio" name="r1" checked>
                <span class="form-check__btn"><span class="form-check__icon"></span><span class="form-check__text">Radio 1</span></span>
              </label>
            </div>
            <div class="form-check">
              <label>
                <input type="radio" name="r1">
                <span class="form-check__btn"><span class="form-check__icon"></span><span class="form-check__text">Radio 2</span></span>
              </label>
            </div>
            <div class="form-check">
              <label>
                <input type="radio" name="r1" disabled>
                <span class="form-check__btn"><span class="form-check__icon"></span><span class="form-check__text">Radio disabled</span></span>
              </label>
            </div>
          </form>
        </div>
      </section>

      <!-- Validation -->
      <section class="ui-section" id="validation">
        <h2 class="ui-title">Validation and submission <span>.js-validation-form → sendForm() → blocks/formHandler.php</span></h2>
        <div class="ui-cols">
          <form action="blocks/formHandler.php" method="post" class="js-validation-form" novalidate>
            <div class="ui-subtitle">jQuery Validation + AJAX (only if native validation is not enough)</div>
            <div class="form-group">
              <label class="form-label" for="v-name">Name *</label>
              <input type="text" class="form-control" id="v-name" name="name" autocomplete="name" required minlength="2">
            </div>
            <div class="form-group">
              <label class="form-label" for="v-email">Email *</label>
              <input type="email" class="form-control" id="v-email" name="email" autocomplete="email" required>
            </div>
            <div class="form-group">
              <label class="form-label" for="v-msg">Message</label>
              <textarea class="form-control" id="v-msg" name="message" rows="4"></textarea>
            </div>
            <div class="form-group">
              <div class="form-check">
                <label>
                  <input type="checkbox" name="agree" required>
                  <span class="form-check__btn"><span class="form-check__icon"></span><span class="form-check__text">I agree to the terms *</span></span>
                </label>
              </div>
            </div>
            <button type="submit" class="btn">Submit</button>
          </form>

          <form action="blocks/formHandler.php" method="post" class="callback-form">
            <div class="ui-subtitle">AJAX + native browser validation, no plugin (.callback-form) — preferred</div>
            <div class="form-group form-floating">
              <input type="text" class="form-control" id="cb-name" name="name" autocomplete="name" placeholder=" " required>
              <label class="form-label" for="cb-name">Name</label>
            </div>
            <div class="form-group form-floating">
              <input type="tel" class="form-control" id="cb-tel" name="phone" autocomplete="tel" placeholder=" " required>
              <label class="form-label" for="cb-tel">Phone</label>
            </div>
            <button type="submit" class="btn btn--outline">Call me back</button>
          </form>
        </div>
        <p class="ui-note">jQuery and jQuery Validation are included solely for <code>.js-validation-form</code>; prefer <code>.callback-form</code> (native <code>required</code>, <code>type</code>, <code>pattern</code>…) and enable the plugin only when native validation is insufficient. The response is shown in a Fancybox popup. To make another form class submit via AJAX, add it to the <code>submit</code> handler in scripts.js.</p>
      </section>

      <!-- Popups -->
      <section class="ui-section" id="popups">
        <h2 class="ui-title">Popups <span>Fancybox, .popup-window, .close-btn</span></h2>
        <div class="ui-row">
          <button type="button" class="btn" data-fancybox data-src="#popup-inline">Inline popup</button>
          <button type="button" class="btn btn--outline" data-fancybox data-src="#popup-form">Popup with a form</button>
          <button type="button" class="btn btn--outline" id="ui-popup-js">Popup from JS</button>
        </div>
        <div class="ui-row">
          <?php foreach ([['#1ab394', 'Photo 1'], ['#7c6bb3', 'Photo 2'], ['#e0795e', 'Photo 3']] as $i => $img) : ?>
            <a href="<?= ui_img(1200, 800, $img[1], $img[0]); ?>" data-fancybox="gallery" data-type="image" data-caption="<?= $img[1]; ?>">
              <img src="<?= ui_img(240, 160, $img[1], $img[0]); ?>" width="240" height="160" alt="<?= $img[1]; ?>">
            </a>
          <?php endforeach; ?>
        </div>

        <div id="popup-inline" class="popup-window" role="dialog" aria-modal="true" aria-labelledby="popup-inline-title" style="display: none">
          <h2 class="h3" id="popup-inline-title">Inline popup</h2>
          <div class="text">
            <p><?= $lorem; ?></p>
          </div>
          <button type="button" class="btn" data-fancybox-close>Close</button>
        </div>

        <div id="popup-form" class="popup-window" role="dialog" aria-modal="true" aria-labelledby="popup-form-title" style="display: none">
          <h2 class="h3" id="popup-form-title">Popup with a form</h2>
          <form action="blocks/formHandler.php" method="post" class="js-validation-form" novalidate>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email *" aria-label="Email" autocomplete="email" required>
            </div>
            <button type="submit" class="btn btn--block">Submit</button>
          </form>
        </div>
      </section>

      <!-- Scrollbars -->
      <section class="ui-section" id="scrollbars">
        <h2 class="ui-title">Scrollbars <span>.has-scrollbar, .has-scrollbar--direction-x</span></h2>
        <div class="ui-cols">
          <div>
            <div class="ui-subtitle">Vertical</div>
            <div class="has-scrollbar ui-scroll-y" tabindex="0" role="region" aria-label="Scrollable text">
              <div class="text">
                <?php for ($i = 0; $i < 6; $i++) : ?>
                  <p><?= $lorem; ?></p>
                <?php endfor; ?>
              </div>
            </div>
          </div>
          <div>
            <div class="ui-subtitle">Horizontal</div>
            <div class="has-scrollbar has-scrollbar--direction-x" tabindex="0" role="region" aria-label="Scrollable items">
              <div class="ui-scroll-x">
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                  <div class="ui-scroll-x__item">Item <?= $i; ?></div>
                <?php endfor; ?>
              </div>
            </div>
          </div>
        </div>
        <p class="ui-note">Colors are set with <code>--scrollbar-track-bg</code> and <code>--scrollbar-thumb-bg</code>, sizes with <code>--scrollbar-size / -track-size / -thumb-size</code>. On touch devices the horizontal scrollbar is hidden.</p>
      </section>

      <!-- Slider -->
      <section class="ui-section" id="slider">
        <h2 class="ui-title">Slider <span>Swiper</span></h2>
        <div class="swiper ui-slider">
          <div class="swiper-wrapper">
            <?php foreach ([['#1ab394', '1'], ['#7c6bb3', '2'], ['#e0795e', '3'], ['#3b82c4', '4'], ['#c4a43b', '5']] as $img) : ?>
              <div class="swiper-slide">
                <img src="<?= ui_img(600, 360, 'Slide ' . $img[1], $img[0]); ?>" width="600" height="360" alt="Slide <?= $img[1]; ?>">
              </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <p class="ui-note">The demo slider is initialized in ui.js. Real project sliders go into the “Swiper Sliders” block in scripts.js (which also contains a fade slider template with video support).</p>
      </section>

      <!-- Mobile menu -->
      <section class="ui-section" id="menu">
        <h2 class="ui-title">Mobile menu <span>.menu-btn, .mob-menu — below 768px</span></h2>
        <p>Resize the browser window below 768px — a burger button appears in the header and the menu slides in from the left.</p>
        <div class="ui-row">
          <button type="button" class="btn btn--outline" id="ui-menu-open">Open menu (if width &lt; 768px)</button>
        </div>
        <p class="ui-note">Classes on <code>html</code>: <code>is-menu-open</code>, <code>is-noscroll</code> (scroll lock with scrollbar-width compensation via <code>--scrollbarWidth</code>).</p>
      </section>

      <!-- States and utilities -->
      <section class="ui-section" id="states">
        <h2 class="ui-title">States and utilities <span>scripts.js</span></h2>
        <div class="ui-row">
          <button type="button" class="btn" id="ui-loader">Show loader (1.5s)</button>
          <button type="button" class="btn btn--outline" id="ui-noscroll">noScroll for 2s</button>
        </div>
        <p class="ui-note">
          The badge in the bottom right corner shows the current breakpoint (<code>checkCSSMedia()</code>) and the classes on <code>html</code>:
          <code>is-touch / no-touch</code>, <code>is-scrolled</code> (&gt;37px), <code>is-scroll-down / is-scroll-up</code>, <code>has-loader</code>.
        </p>
        <p class="ui-note">Breakpoints (var.css / media.css): xl ≥1400, lg &lt;1400, md &lt;1200, sm &lt;992, xs &lt;768, xxs &lt;576.</p>
        <div class="ui-spacer"></div>
      </section>

    </div>
  </main>

  <div class="ui-state" id="ui-state" aria-hidden="true"></div>

  <?php require 'blocks/footer.php'; ?>
  <?php require 'blocks/foot.php'; ?>
  <script src="assets/js/ui.js?<?= $ver; ?>"></script>
</body>

</html>