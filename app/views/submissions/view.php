<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
               <section class="class_heading" style="<?php echo $data['background']; ?>">
                    <a href="<?php echo ROOT . 'assignments/edit/' . $data['assignment']['id']; ?>" class="btn btn_green">Edit Assignment</a>
               </section>
               <?php flash('submission_success'); ?>
               <?php flash('submission_error'); ?>
               <section class="course_content" data-simplebar>
                    <?php foreach ($data['submissions'] as $submission): ?>
                         <?php $student = $data['student'][$submission['id']]; ?>

                         <div class="content_container">
                              <div class="icon icon_picture" style="background-image: url(<?php echo $student['avatar']; ?>)"></div>
                              <div class="content">
                                   <div class="assignment_info">
                                        <a href="<?php echo ROOT . 'submissions/review/' . $submission['id']; ?>"><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></a>
                                        <div class="date">
                                             <?php
                                             $date = date_create($submission['date_submitted']);
                                             echo date_format($date, 'l F j, Y | g:iA');
                                             ?>
                                        </div>
                                   </div>

                                   <?php if (!empty($data['grades'][$submission['id']])): ?>
                                        <p>Grade: <?php echo $data['grades'][$submission['id']]['grade'] ?></p>
                                   <?php else: ?>
                                        <p>Grade: Not yet graded.</p>
                                   <?php endif; ?>
                              </div>
                         </div>

                    <?php endforeach; ?>
               </section>
          </section>
      </section>
     <?php require APP . 'views/layouts/classes/right_section_module.php'; ?>
</section>

<!-- #website -->

<?php $textEditor = true; // Use this to enable Froala Text Editor ?>
<?php require APP . 'views/layouts/portal/footer.php'; ?>
