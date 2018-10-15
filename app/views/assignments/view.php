<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
               <section class="class_heading" style="<?php echo $data['background']; ?>">

                    <?php if (isTeacher()): ?>

                         <a href="<?php echo ROOT . 'assignments/new/' . $data['class']['id']; ?>" class="btn btn_red">New Assignment</a>

                    <?php endif; ?>

               </section>
               <?php flash('assignment_success'); ?>
               <?php flash('assignment_error'); ?>
               <section class="course_content" data-simplebar>
                    <?php foreach ($data['assignments'] as $assignment): ?>

                         <div class="content_container">

                              <?php if (!empty($data['submission'][$assignment['id']])){ $icon_color = 'icon_blue'; } else { $icon_color = 'icon_red'; } ?>

                              <div class="icon <?php echo $icon_color; ?>">

                                   <?php if (isTeacher()): ?>

                                        <i><?php echo $data['submission_count'][$assignment['id']]; ?></i>
                                        <a href="<?php echo ROOT . 'assignments/edit/' . $assignment['id']; ?>" class="edit fas fa-pencil-alt icon_blue"></a>

                                   <?php else: ?>

                                        <i class="fas fa-clock"></i>

                                   <?php endif; ?>

                              </div>
                              <div class="content">
                                   <div class="assignment_info">
                                        <?php if (isTeacher() || isAdmin()): ?>
                                             <a href="<?php echo ROOT . 'submissions/view/' . $assignment['id']; ?>"><?php echo $assignment['name']; ?></a>
                                        <?php else: ?>
                                             <?php if (!empty($data['submission'][$assignment['id']])): ?>

                                                  <a href="<?php echo ROOT . 'submissions/review/' . $data['submission'][$assignment['id']][0]['id']; ?>"><?php echo $assignment['name']; ?></a>
                                             <?php else: ?>
                                                  <a href="<?php echo ROOT . 'submissions/new/' . $assignment['id']; ?>"><?php echo $assignment['name']; ?></a>
                                             <?php endif; ?>
                                        <?php endif; ?>
                                        <div class="date">
                                             <?php
                                             $date = date_create($assignment['date_due']);
                                             echo date_format($date, 'l F j, Y | g:iA');
                                             ?>
                                        </div>
                                   </div>
                                   <p><?php echo $assignment['description']; ?></p>
                              </div>
                         </div>

                    <?php endforeach; ?>
               </section>
          </section>
      </section>
     <?php require APP . 'views/layouts/classes/right_section_module.php'; ?>
</section>
<!-- #website -->

<?php require APP . 'views/layouts/portal/footer.php'; ?>
