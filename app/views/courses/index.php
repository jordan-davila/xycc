<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
              <h1 class="module_heading">List of Courses</h1>
              <?php flash('register_success'); ?>
              <?php flash('register_error'); ?>
              <div class="user_table" data-simplebar>
                  <table class="course_table">
                      <tr>
                          <th width="40">ID</th>
                          <th>Name</th>
                          <th width="170">Department</th>
                          <th width="90"># Classes</th>
                          <th width="80">Action</th>
                      </tr>

                       <?php foreach ($data['courses'] as $course) { ?>
                            <tr>
                                 <td><?php echo $course['id']; ?></td>
                                 <td><?php echo $course['name']; ?></td>
                                 <td><?php echo $data['course_departments'][$course['id']]['name']; ?></td>
                                 <td><?php echo $course['department_id']; ?></td>
                                 <td><a href="<?php echo ROOT . 'courses/edit/' . $course['id']; ?>" class="btn btn_red">View</a></td>
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
              <div class="stats_container">
                 <ul>
                      <li>Total Courses: 12</li>
                      <li>Total Classes: 15</li>
                 </ul>
                 <section class="btn_container">
                      <a href="<?php echo ROOT . 'users/'; ?>" class="btn btn_red">Add New Course</a>
                 </section>
              </div>
          </section>
          <section class="modules department_list_module">
              <h1 class="module_heading">Departments</h1>
              <ul data-simplebar>
                   <li><a href="<?php echo ROOT . 'courses/all' ?>" class="<?php echo ($data['department_name'] == 'all') ? 'selected' : false; ?>">All</a></li>
                    <?php foreach ($data['departments'] as $department) { ?>
                        <li><a href="<?php echo ROOT . 'courses/all/' . $department['id'] ?>" class="<?php echo ($data['department_name'] == $department['id']) ? 'selected' : false; ?>"><?php echo $department['name']; ?></a></li>
                    <?php } ?>
              </ul>
          </section>
      </section>
</section>
<!-- #website -->

<?php require APP . 'views/layouts/portal/footer.php'; ?>
