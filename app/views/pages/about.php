<?php require APP . 'views/layouts/pages/header.php'; ?>

<section id="website" class="full_site">
  <!-- Logo -->
  <div class="logo_full_wrap no_opacity">
    <a href="<?php echo ROOT;?>" class="logo_wrap home_page">
      <div class="logo white_icon_logo"></div>
    </a>
    <div class="logo_text"></div>
  </div>

  <!-- Apply Button -->
  <a href="#" class="apply_btn no_opacity">Apply Today</a>

  <!-- Login Button -->
  <div class="login_wrap no_opacity">
    <a href="<?php echo ROOT; ?>users/login">Login to Portal</a>
    <div class="login_line"></div>
  </div>

  <!-- Main Content: Centered Menu & Title -->
  <section id="main_content" class="no_opacity left_content">
      <h1><span>02</span>About</h1>
      <?php require APP . 'views/layouts/pages/nav.php'; ?>
      <p>Hello, World! We are XY Community College. A space for learning design, technology and entrepreneurship at the highest level, situated in globally admired creative hub and harbour city.</p>
  </section><!-- #main_content -->
  <section class="gallery_circles full_gallery">
    <div class="circle selected full_circle" style="background-image: url('<?php echo ROOT; ?>img/gallery/01.jpeg');"></div>
  </section>
</section><!-- #website -->

<?php require APP . 'views/layouts/pages/footer.php'; ?>
