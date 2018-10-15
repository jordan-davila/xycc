<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
               <section class="class_heading" style="<?php echo $data['background']; ?>">
                    <?php if (isTeacher()): ?>
                         <a href="<?php echo ROOT . 'assignments/edit/' . $data['assignment']['id']; ?>" class="btn btn_green">Edit Assignment</a>
                    <?php endif; ?>
               </section>
               <?php flash('submission_success'); ?>
               <?php flash('submission_error'); ?>
               <section class="submission_module align_baseline padding30 flex_row" data-simplebar>
                    <div class="assignment_info_wrap">
                         <div class="assignment_info">
                              <h1><?php echo $data['assignment']['name']; ?></h1>
                              <div class="date">
                                   <?php
                                   $date = date_create($data['assignment']['date_due']);
                                   echo date_format($date, 'l F j, Y | g:iA');
                                   ?>
                              </div>
                         </div>
                         <?php if (isStudent()): ?>
                              <p><?php echo $data['assignment']['description']; ?></p>
                         <?php endif; ?>
                    </div>

                    <div class="submission_field_wrap">

                         <?php if (!empty($data['submission']['text'])): ?>

                              <div class="submission_field">

                                   <h1>Text Submission</h1>
                                   <textarea id="no_editor" class="margin_bottom_30" disabled><?php echo $data['submission']['text']; ?></textarea>

                              </div>

                         <?php endif; ?>



                         <div class="submission_field_row">

                              <?php if (!empty($data['submission']['filename'])): ?>

                                   <div class="flex_50_per">

                                        <h1>File Submission</h1>
                                        <a href="<?php echo ROOT . 'submissions/download/' . $data['submission']['filename']; ?>"><?php echo $data['submission']['filename']; ?></a>

                                   </div>

                              <?php else: ?>

                                   <div class="flex_50_per">

                                        <h1>File Submission</h1>
                                        <p>No File Submitted</p>

                                   </div>

                              <?php endif; ?>

                              <div class="flex_50_per text_align_right">

                                   <h1>Date Submitted</h1>
                                   <p>
                                        <?php

                                             $date = date_create($data['submission']['date_submitted']);
                                             echo date_format($date, 'l F j, Y | g:iA');

                                        ?>
                                   </p>

                              </div>

                         </div>

                         <?php if (isTeacher()): ?>

                              <?php if (empty($data['grade'])): ?>
                                   <form class="forms modules grade_sub_module align_baseline" action="<?php echo ROOT . 'grades/create/' . $data['submission']['id']; ?>" method="post">
                                        <div class="half_field">
                                             <label for="grade">Grade</label>
                                             <input type="number" name="grade" value="">
                                        </div>
                                        <div class="half_field">
                                             <label for="grade">Feedback</label>
                                             <input type="text" name="feedback" value="">
                                        </div>
                                        <input type="hidden" name="assignment_id" value="<?php echo $data['assignment']['id']; ?>">
                                        <a href="<?php echo ROOT . 'submissions/view/' . $data['assignment']['id']; ?>" class="btn btn_red margin_right_10">Cancel</a>
                                        <input type="submit" name="submit" class="btn btn_green" value="Grade Submission">

                                   </form>
                              <?php else: ?>
                                   <form class="forms modules grade_sub_module align_baseline" action="<?php echo ROOT . 'grades/update/' . $data['grade']['id']; ?>" method="post">
                                        <div class="half_field">
                                             <label for="grade">Grade</label>
                                             <input type="number" name="grade" value="<?php echo $data['grade']['grade']; ?>">
                                        </div>
                                        <div class="half_field">
                                             <label for="grade">Feedback</label>
                                             <input type="text" name="feedback" value="<?php echo $data['grade']['feedback']; ?>">
                                        </div>
                                        <input type="hidden" name="grade_id" value="<?php echo $data['grade']['id']; ?>">
                                        <input type="hidden" name="assignment_id" value="<?php echo $data['assignment']['id']; ?>">
                                        <a href="<?php echo ROOT . 'submissions/view/' . $data['assignment']['id']; ?>" class="btn btn_red margin_right_10">Cancel</a>
                                        <input type="submit" name="submit" class="btn btn_green" value="Edit Grade">

                                   </form>
                              <?php endif; ?>

                         <?php else: ?>

                              <?php if (!empty($data['grade'])): ?>

                                   <div class="submission_field_row">

                                        <div class="flex_50_per">

                                             <h1>Grade</h1>
                                             <p><?php echo $data['grade']['grade']; ?></p>

                                        </div>

                                        <div class="flex_50_per text_align_right">

                                             <h1>Feedback</h1>
                                             <p><?php echo $data['grade']['feedback']; ?></p>

                                        </div>

                                   </div>

                              <?php endif; ?>

                         <?php endif; ?>

                    </div>

               </section>
          </section>
      </section>
     <?php require APP . 'views/layouts/classes/right_section_module.php'; ?>
</section>

<!-- #website -->

<?php $textEditor = true; // Use this to enable Froala Text Editor ?>
<?php require APP . 'views/layouts/portal/footer.php'; ?>
