<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
     <section class="left_section_module flex_w_1">
          <section class="modules">
               <h1 class="module_heading">Course Details</h1>
               <form class="forms padding_top_none" action="index.html" method="post">
                    <div class="half_field">
                         <label for="id">ID</label>
                         <input type="text" name="id" value="<?php echo $data['course']['id']; ?>" placeholder="ID">
                    </div>
                    <div class="half_field">
                         <label for="name">Name</label>
                         <input type="text" name="name" value="<?php echo $data['course']['name']; ?>" placeholder="Name">
                    </div>
                    <div class="half_field">
                         <label for="department_id">Department</label>
                         <select class="" name="department_id">
                              <?php

                              foreach ($data['departments'] as $department) {
                                   if ($data['course']['department_id'] == $department['id']) {
                                        echo '<option value="' . $department['id'] . '" selected>' . $department['name'] . '</option>';
                                   } else {
                                        echo '<option value="' . $department['id'] . '">' . $department['name'] . '</option>';
                                   }
                              }

                               ?>
                         </select>
                    </div>
                    </div>
                    <div class="half_field">
                         <label for="Requirements">Requirements</label>
                         <input type="text" name="requirements" value="<?php echo $data['course']['requirements']; ?>" placeholder="Required Classes">
                    </div>
                    <div class="half_field">
                         <label for="Credits">Credits</label>
                         <input type="number" name="credits" value="<?php echo $data['course']['credits']; ?>" placeholder="Credit Value">
                    </div>
                    <div class="half_field">
                         <label for="capacity">Capacity</label>
                         <input type="number" name="capacity" value="<?php echo $data['course']['capacity']; ?>" placeholder="Capacity">
                    </div>
                    <div class="full_field">
                         <textarea name="name" rows="8" cols="80"><?php echo $data['course']['description']; ?></textarea>
                    </div>
                    <div class="third_field">
                         <input type="submit" name="submit" value="Edit Course" class="btn btn_green">
                    </div>
               </form>
          </section>
     </section>
     <section class="right_section_module">
          <section class="top_section_module">
               <section class="modules">
                    <div class="module_heading_options">
                         <h1>Classes / Sections</h1>
                         <select class="semester_selector">
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/SPR2018" <?php echo ($data['semester'] == "SPR2018") ? 'selected' : ''; ?>>SPR2018</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/FALL2018" <?php echo ($data['semester'] == "FALL2018") ? 'selected' : ''; ?>>FALL2018</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/SPR2017" <?php echo ($data['semester'] == "SPR2017") ? 'selected' : ''; ?>>SPR2017</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/FALL2017" <?php echo ($data['semester'] == "FALL2017") ? 'selected' : ''; ?>>FALL2017</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/SPR2016" <?php echo ($data['semester'] == "SPR2016") ? 'selected' : ''; ?>>SPR2016</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/FALL2016" <?php echo ($data['semester'] == "FALL2016") ? 'selected' : ''; ?>>FALL2016</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/SPR2015" <?php echo ($data['semester'] == "SPR2015") ? 'selected' : ''; ?>>SPR2015</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/FALL2015" <?php echo ($data['semester'] == "FALL2015") ? 'selected' : ''; ?>>FALL2015</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/SPR2014" <?php echo ($data['semester'] == "SPR2014") ? 'selected' : ''; ?>>SPR2014</option>
                              <option value="<?php echo ROOT . 'courses/edit/' . $data['course']['id']; ?>/FALL2014" <?php echo ($data['semester'] == "FALL2014") ? 'selected' : ''; ?>>FALL2014</option>
                         </select>
                    </div>
                    <div class="user_table" data-simplebar>
                        <table>
                            <tr>
                               <th>Teacher</th>
                               <th width="90">Section</th>
                               <th width="80">Action</th>
                            </tr>
                            <?php foreach ($data['classes'] as $class) { ?>

                                <tr>
                                     <td>
                                          <div class="avatar_name_container">
                                              <div class="avatar" style="background-image: url('<?php echo $data['teachers'][$class['teacher_id']]['avatar']; ?>'); "></div>
                                              <div class="full_name">
                                                   <a href="<?php  echo ROOT . 'users/edit/' . $class['teacher_id']; ?>" class="user_link">
                                                       <?php echo $data['teachers'][$class['teacher_id']]['first_name'] . ' ' . $data['teachers'][$class['teacher_id']]['last_name']; ?>
                                                  </a>
                                              </div>
                                          </div>
                                     </td>
                                     <td> <?php echo $class['section']; ?></td>
                                     <td>
                                          <a href="<?php echo ROOT . 'classes/view/' . $class['id']; ?>" class="btn btn_red">View</a>
                                     </td>
                                </tr>

                           <?php } ?>

                        </table>

                    </div>
               </section>
          </section>
          <section class="bottom_section_module">
               <section class="modules">
                    <h1 class="module_heading">Add New Class / Section</h1>
                    <form class="forms padding_top_none" action="index.html" method="post">
                         <div class="half_field">
                              <label for="id">Teacher</label>
                              <select class="" name="">
                                   <?php foreach ($data['allTeachers'] as $teacher) { ?>
                                        <option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['first_name'] . ' ' . $teacher['last_name']; ?></option>
                                   <?php } ?>
                              </select>
                         </div>
                         <div class="half_field">
                              <label for="name">Semester</label>
                              <select class="" name="">
                                   <option value="FALL2018">FALL2018</option>
                                   <option value="SPR2018">SPR2018</option>
                                   <option value="FALL2017">FALL2017</option>
                                   <option value="SPR2017">SPR2017</option>
                                   <option value="FALL2016">FALL2016</option>
                                   <option value="SPR2016">SPR2016</option>
                              </select>
                         </div>
                         <div class="half_field">
                              <label for="name">Schedule [Seperate with | ]</label>
                              <input type="text" name="schedule" placeholder="Schedule">
                         </div>
                         <div class="half_field">
                              <label for="name">Room</label>
                              <input type="text" name="room" placeholder="Room">
                         </div>

                         <div class="third_field">
                              <input type="submit" name="submit" value="Add Class" class="btn btn_green">
                         </div>
                    </form>
               </section>
          </section>
     </section>
</section>

<?php require APP . 'views/layouts/portal/footer.php'; ?>
