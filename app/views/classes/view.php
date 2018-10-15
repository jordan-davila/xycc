<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
               <section class="class_heading" style="<?php echo $data['background']; ?>">

                    <?php if (isTeacher()): ?>

                         <a href="#" class="btn btn_green">Edit Class</a>

                    <?php endif; ?>

               </section>
               <section class="class_info">
                    <section class="flex_w_2">
                         <h1>Welcome to <?php echo $data['course']['name'] ?></h1>
                         <p><?php echo $data['course']['description']; ?></p>
                    </section>
                    <section>
                         <h1>Assignments & Tests</h1>
                         <ul>
                              <li><i>Assignments Due: </i> 1</li>
                              <li><i>Assignments Completed: </i> 2</li>
                              <li><i>Tests Taken: </i> 1</li>
                         </ul>
                    </section>
               </section>
               <section class="course_content" data-simplebar>
                    <div class="content_container">
                         <div class="icon icon_red"><i class="fas fa-exclamation-triangle"></i></div>
                         <div class="content">
                              <a href="#">Reminder: Please read over Chapter 6</a>
                              <p>On May 7, you'll have a quiz. Don't forget to study.</p>
                         </div>
                    </div>
                    <div class="content_container">
                         <div class="icon icon_yellow"><i class="fas fa-exclamation-circle"></i></div>
                         <div class="content">
                              <a href="#">Notification: No class this Monday.</a>
                              <p>Please make sure to review Chapter 4. We will continue on Wednesday. -John</p>
                         </div>
                    </div>
                    <div class="content_container">
                         <div class="icon icon_blue"><i class="far fa-file-alt"></i></div>
                         <div class="content">
                              <a href="#"><?php echo $data['course']['name'] ?> Sylabus</a>
                         </div>
                    </div>
                    <div class="content_container">
                         <div class="icon icon_pink"><i class="fa fa-comment-alt"></i></div>
                         <div class="content">
                              <a href="#">About this course</a>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                         </div>
                    </div>
               </section>
          </section>
      </section>
      <?php require APP . 'views/layouts/classes/right_section_module.php'; ?>
</section>
<!-- #website -->

<?php require APP . 'views/layouts/portal/footer.php'; ?>
