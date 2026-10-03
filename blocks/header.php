<a class="skip-link" href="#main">Skip to content</a>

<header class="header">
  <div class="container">
    <button type="button" class="menu-btn" aria-label="Open menu" aria-expanded="false" aria-controls="mob-menu">
      <span aria-hidden="true"></span>
    </button>

    <div class="mob-menu">
      <div class="mob-menu__bg" aria-hidden="true"></div>
      <div class="mob-menu__inner" id="mob-menu">
        <button type="button" class="mob-menu__close close-btn" aria-label="Close menu">
          <svg class="icon" aria-hidden="true">
            <use xlink:href="assets/images/svg-sprite.svg?<?= $ver; ?>#close"></use>
          </svg>
        </button>
        <div class="mob-menu__content">
          <nav aria-label="Main">
            <ul>
              <li><a href="index.php" <?= @$page === 'home' ? ' class="is-active" aria-current="page"' : ''; ?>>Home</a></li>
              <li><a href="ui.php" <?= @$page === 'ui' ? ' class="is-active" aria-current="page"' : ''; ?>>UI Kit</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>