<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
              <h1 class="module_heading">List of Classes / Sections</h1>
              <?php flash('register_success'); ?>
              <?php flash('register_error'); ?>
              <div class="user_table" data-simplebar>
                  <table>
                      <tr>
                          <th width="40">ID</th>
                          <th width="170">Teacher</th>
                          <th>Name</th>
                          <th width="80">Capacity</th>
                          <th width="80">Section</th>
                          <th width="80">Semester</th>
                          <th width="80">Action</th>
                      </tr>

                      <?php foreach ($data['classes'] as $class) { ?>
                      <tr>
                          <td>
                              <?php echo $class['id']; ?>
                          </td>
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
                          <td>
                               <a href="<?php  echo ROOT . 'courses/edit/' . $class['course_id']; ?>" class="user_link">
                                    <?php echo $data['courses'][$class['course_id']]['name']; ?>
                              </a>
                          </td>
                          <td>
                              <?php echo $data['courses'][$class['course_id']]['capacity']; ?>
                          </td>
                          <td>
                              <?php echo $class['section']; ?>
                          </td>
                          <td>
                               <?php echo $class['semester']; ?>
                          </td>
                          <td>
                              <a href="<?php echo ROOT . 'users/edit/' . $class['id']; ?>" class="btn btn_green">Edit</a>
                          </td>
                      </tr>
                      <?php } ?>

                  </table>

              </div>
              <div class="pagination_container">
                   <?php echo $data['pagination']; ?>
              </div>
          </section>
      </section>
      <section class="right_section_module">
          <section class="modules user_stats_module">
              <h1 class="module_heading">Courses / Classes Stats</h1>

          </section>
          <section class="modules department_list_module">
              <h1 class="module_heading">Departments</h1>
              <ul data-simplebar>
                   <li><a href="" class="selected">All</a></li>
                    <?php foreach ($data['departments'] as $department) { ?>
                        <li><a href="?department=<?php echo $department['id'] ?>" class=""><?php echo $department['name'] . ' (' . $data['departmentCourseCount'][$department['id']] . ')'; ?></a></li>
                    <?php } ?>
              </ul>
          </section>
          <section class="modules courses_add_new_module">
              <!-- <h1 class="module_heading">Add New: </h1> -->
              <div class="courses_buttons">
                   <a href="courses/" class="btn btn_red">View Courses</a>
                   <a href="courses/create" class="btn btn_red">Add Courses</a>
                   <a href="courses/create" class="btn btn_red">Add Classes</a>
              </div>
          </section>
      </section>
</section>
<!-- #website -->

<?php require APP . 'views/layouts/portal/footer.php'; ?>
