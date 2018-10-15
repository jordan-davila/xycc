<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ROOT; ?>/public/favicon.png">
  <link rel="stylesheet" href="<?php echo ROOT; ?>public/css/fonts.css">
  <link rel="stylesheet" href="<?php echo ROOT; ?>public/css/reset.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/1d676bd406.css">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo ROOT; ?>public/css/portal.css">
  <title>
    <?php echo SITENAME . ' | ' . $data['title']; ?>
  </title>
</head>

<body class="overflow_hidden">
<section class="preloader hidden">
  <div class="top_screen move_up"></div>
  <div class="bottom_screen move_down"></div>
  <div class="white_icon_logo fade_out"></div>
</section>
<main id="main">

<div class="red_bg" id="particles"></div>

<section id="website" class="btn_grey">
  <!-- Logo -->
  <div class="logo_full_wrap">
    <a href="<?php echo ROOT; ?>" class="logo_wrap home_page">
      <div class="logo white_icon_logo"></div>
    </a>
  </div>

  <!-- Login Button -->
  <div class="login_wrap color_grey">
    <a href="<?php echo ROOT; ?>">Back</a>
    <div class="login_line"></div>
  </div>

  <section class="form_login_container">
    <form action="<?php echo ROOT;?>users/auth/" method="post" autocomplete="off">
      <?php

      //Display Errors
      echo $data['errors']['email'] ? '<div class="login-error">'. $data['errors']['email'] .'</div>' : false;
      echo $data['errors']['password'] ? '<div class="login-error">'. $data['errors']['password'] .'</div>' : false;
      echo $data['errors']['match'] ? '<div class="login-error">'. $data['errors']['match'] .'</div>' : false;

      ?>
      <input type="email" name="email" placeholder="Email" autocomplete="false">
      <input type="password" name="password" placeholder="Password" autocomplete="new-password">
      <input type="submit" name="submit" value="Log In">
      <a href="<?php echo ROOT; ?>portal/password">Forgot Username or Password?</a>
    </form>
  </section>
</section><!-- #website -->

</main>


<!-- scripts -->
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://use.fontawesome.com/e6e86262b4.js"></script> <!-- Icons -->
<script src="<?php echo ROOT; ?>public/js/particles.js"></script>
<script src="<?php echo ROOT; ?>public/js/portal.js"></script>
</body>

</html>
