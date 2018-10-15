<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
               <section class="class_heading" style="<?php echo $data['background']; ?>"></section>
               <?php flash('assignment_success'); ?>
               <?php flash('assignment_error'); ?>
               <form class="forms submission_module align_baseline padding30 flex_row" action="<?php echo ROOT . 'assignments/update/' . $data['assignment']['id']; ?>" method="post">

                    <div class="full_field">
                         <label for="title" class="margin_bottom_20">Assignment Title</label>
                         <input type="text" name="title" value="<?php echo $data['assignment']['name']; ?>">
                    </div>
                    <div class="half_field">
                         <label for="title" class="margin_bottom_20">Due Date</label>
                         <input type="datetime-local" name="due_date" value="<?php echo date('Y-m-d\TH:i:s', strtotime($data['assignment']['date_due'])); ?>">
                    </div>
                    <div class="half_field">
                         <label for="title" class="margin_bottom_20">Visible?</label>
                         <select class="" name="visible">
                              <option value="1" <?php if ($data['assignment']['visible'] == 1) { echo 'selected'; } ?>>Yes</option>
                              <option value="0" <?php if ($data['assignment']['visible'] == 0) { echo 'selected'; } ?>>No</option>
                         </select>
                    </div>
                    <div class="full_field">
                         <label for="name" class="margin_bottom_20">Description</label>
                         <textarea name="description" id="editor" rows="8" cols="80"><?php echo $data['assignment']['description']; ?></textarea>
                    </div>


                    <a href="<?php echo ROOT . 'assignments/view/' . $data['class']['id']; ?>" class="btn btn_pink margin_right_10">Cancel</a>
                    <a href="<?php echo ROOT . 'assignments/delete/' . $data['assignment']['id']; ?>" class="btn btn_red margin_right_10">Delete</a>
                    <input type="submit" class="btn btn_green" name="submit" value="Edit Assignment">

               </form>
          </section>
      </section>
     <?php require APP . 'views/layouts/classes/right_section_module.php'; ?>
</section>

<!-- #website -->

<?php $textEditor = true; // Use this to enable Froala Text Editor ?>
<?php require APP . 'views/layouts/portal/footer.php'; ?>
