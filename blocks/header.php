<div class="header">
  <div class="container">
    <button type="button" class="menu-btn">
      <span></span>
    </button>

    <div class="mob-menu">
      <div class="mob-menu__bg"></div>
      <div class="mob-menu__inner">
        <button type="button" class="mob-menu__close close-btn" aria-label="Close">
          <svg class="icon">
            <use xlink:href="assets/images/svg-sprite.svg?<?= $ver; ?>#close"></use>
          </svg>
        </button>
        <div class="mob-menu__content">
          <nav>
            <ul>
              <li><a href="index.php" <?= @$page === 'home' ? ' class="is-active"' : ''; ?>>Home</a></li>
              <li><a href="ui.php" <?= @$page === 'ui' ? ' class="is-active"' : ''; ?>>UI Kit</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>