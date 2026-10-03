<?php $ver = time(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="color-scheme" content="light dark">

  <title>Page Title</title>

  <!-- https://evilmartians.com/chronicles/how-to-favicon-in-2021-six-files-that-fit-most-needs -->
  <link rel="icon" href="favicon.ico" sizes="32x32">
  <link rel="icon" href="assets/images/favicons/favicon.png" type="image/png" />
  <link rel="icon" href="assets/images/favicons/favicon.svg" type="image/svg+xml" />
  <link rel="apple-touch-icon" href="assets/images/favicons/apple-touch-icon.png"><!-- 180×180 -->

  <meta name="theme-color" content="#1ab394">

  <link href="assets/lib/fancybox-6.1.13/fancybox.css" rel="stylesheet" />
  <link href="assets/lib/swiper-11.1.14/swiper-bundle.min.css" rel="stylesheet" />
  <link href="assets/css/var.css?<?= $ver; ?>" rel="stylesheet" />
  <link href="assets/css/style.css?<?= $ver; ?>" rel="stylesheet" />
  <link href="assets/css/media.css?<?= $ver; ?>" rel="stylesheet" />

  <script src="assets/lib/jquery-3.7.1/jquery-3.7.1.min.js"></script>
  <script>
    const ver = '<?= $ver; ?>';
  </script>
</head>