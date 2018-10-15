<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
               <section class="class_heading" style="<?php echo $data['background']; ?>"></section>
               <?php flash('register_success'); ?>
               <?php flash('register_error'); ?>
               <form class="forms submission_module align_baseline padding30 flex_row" action="<?php echo ROOT . 'submissions/create/' . $data['assignment']['id']; ?>" method="post" enctype="multipart/form-data">

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
                         <p><?php echo $data['assignment']['description']; ?></p>

                    </div>

                    <div class="full_field">
                         <label for="name" class="margin_bottom_20">Text Submission</label>
                         <textarea name="text" id="editor" rows="8" cols="80"></textarea>
                    </div>
                    <div class="full_field">
                         <label for="name">Upload Submission: .pdf, .docx, .ppt, .rtf</label>
                         <input type="file" accept=".pdf,.csv,.docx,.doc,.xls,.rtf,.txt,.png,.jpg,.zip" name="file" value="">
                    </div>

                    <a href="<?php echo ROOT . 'assignments/view/' . $data['class']['id']; ?>" class="btn btn_red margin_right_10">Cancel</a>
                    <input type="submit" class="btn btn_green" name="submit" value="Submit Assignment">

               </form>
          </section>
      </section>
     <?php require APP . 'views/layouts/classes/right_section_module.php'; ?>
</section>

<!-- #website -->

<?php $textEditor = true; // Use this to enable Froala Text Editor ?>
<?php require APP . 'views/layouts/portal/footer.php'; ?>
