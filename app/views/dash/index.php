<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content">

     <?php

     // Apply corresponding dashboard modules
     if (isAdmin()) { require APP . 'views/layouts/dash/adminDash.php'; }
     if (isTeacher()) { require APP . 'views/layouts/dash/teacherDash.php'; }
     if (isStudent()) { require APP . 'views/layouts/dash/studentDash.php'; }

     ?>

     <!-- Event and Messages Modules will display on all Roles -->
     <section class="bottom_section_module">
          <!-- Events -->
          <section class="modules">
               <div class="event_container">
                    <div class="event">
                         <div class="bg_blk_cover"></div>
                         <div class="event_image" style="background-image: url('<?php echo ROOT . 'img/events/1.jpg'; ?>'); "></div>
                         <h1><i>Technology</i><br>New Unity3d VR Course Coming Fall 2018</h1>
                         <div class="learn_more">Learn More</div>
                    </div>
                    <div class="event">
                         <div class="bg_blk_cover"></div>
                         <div class="event_image" style="background-image: url('<?php echo ROOT . 'img/events/2.jpg'; ?>'); "></div>
                         <h1><i>Technology</i><br>New Unity3d VR Course Coming Fall 2018</h1>
                         <div class="learn_more">Learn More</div>
                    </div>
                    <div class="event">
                         <div class="bg_blk_cover"></div>
                         <div class="event_image" style="background-image: url('<?php echo ROOT . 'img/events/3.jpg'; ?>'); "></div>
                         <h1><i>Technology</i><br>New Unity3d VR Course Coming Fall 2018</h1>
                         <div class="learn_more">Learn More</div>
                    </div>
                    <div class="event">
                         <div class="bg_blk_cover"></div>
                         <div class="event_image" style="background-image: url('<?php echo ROOT . 'img/events/4.jpg'; ?>'); "></div>
                         <h1><i>Technology</i><br>New Unity3d VR Course Coming Fall 2018</h1>
                         <div class="learn_more">Learn More</div>
                    </div>
               </div>
          </section>

          <!-- Recent Messages -->
          <section class="modules">
               <h1 class="module_heading">Recent Messages</h1>
               <div data-simplebar class="messages_container">
                    <a href="<?php echo ROOT; ?>" class="recent_messages">
                         <div class="left_line_hover active"></div>
                         <div class="message_image" style="background-image: url(<?php echo ROOT . 'img/users/4.jpg'; ?>)"></div>
                         <div class="message_info">
                              <h1>Networking Fundamentals</h1>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor layoutsididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                         </div>
                    </a>
                    <a href="<?php echo ROOT; ?>" class="recent_messages">
                         <div class="left_line_hover"></div>
                         <div class="message_image" style="background-image: url(<?php echo ROOT . 'img/users/4.jpg'; ?>)"></div>
                         <div class="message_info">
                              <h1>Networking Fundamentals</h1>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor layoutsididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                         </div>
                    </a>
                    <a href="<?php echo ROOT; ?>" class="recent_messages">
                         <div class="left_line_hover"></div>
                         <div class="message_image" style="background-image: url(<?php echo ROOT . 'img/users/4.jpg'; ?>)"></div>
                         <div class="message_info">
                              <h1>Networking Fundamentals</h1>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor layoutsididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                         </div>
                    </a>
                    <a href="<?php echo ROOT; ?>" class="recent_messages">
                         <div class="left_line_hover"></div>
                         <div class="message_image" style="background-image: url(<?php echo ROOT . 'img/users/4.jpg'; ?>)"></div>
                         <div class="message_info">
                              <h1>Networking Fundamentals</h1>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor layoutsididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                         </div>
                    </a>
                    <a href="<?php echo ROOT; ?>" class="recent_messages">
                         <div class="left_line_hover"></div>
                         <div class="message_image" style="background-image: url(<?php echo ROOT . 'img/users/4.jpg'; ?>)"></div>
                         <div class="message_info">
                              <h1>Networking Fundamentals</h1>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor layoutsididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                         </div>
                    </a>
               </div>
               <div class="button_container">
                    <a href="#" class="button">View More</a>
               </div>
          </section>
     </section>
</section>

<?php require APP . 'views/layouts/portal/footer.php'; ?>
