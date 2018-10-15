<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
               <section class="class_heading" style="<?php echo $data['background']; ?>"></section>
               <?php flash('register_success'); ?>
               <?php flash('register_error'); ?>
               <form class="forms submission_module align_baseline padding30 flex_row" action="<?php echo ROOT . 'assignments/create/' . $data['class']['id']; ?>" method="post">

                    <div class="full_field">
                         <label for="title" class="margin_bottom_20">Assignment Title</label>
                         <input type="text" name="title" placeholder="">
                    </div>
                    <div class="half_field">
                         <label for="title" class="margin_bottom_20">Due Date</label>
                         <input type="datetime-local" name="due_date" placeholder="">
                    </div>
                    <div class="half_field">
                         <label for="title" class="margin_bottom_20">Visible?</label>
                         <select class="" name="visible">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                         </select>
                    </div>
                    <div class="full_field">
                         <label for="name" class="margin_bottom_20">Description</label>
                         <textarea name="description" id="editor" rows="8" cols="80"></textarea>
                    </div>


                    <a href="<?php echo ROOT . 'assignments/view/' . $data['class']['id']; ?>" class="btn btn_red margin_right_10">Cancel</a>
                    <input type="submit" class="btn btn_green" name="submit" value="Add Assignment">

               </form>
          </section>
      </section>
     <?php require APP . 'views/layouts/classes/right_section_module.php'; ?>
</section>

<!-- #website -->

<?php $textEditor = true; // Use this to enable Froala Text Editor ?>
<?php require APP . 'views/layouts/portal/footer.php'; ?>
