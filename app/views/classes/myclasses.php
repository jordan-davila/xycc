<?php require APP . 'views/layouts/portal/header.php'; ?>

<section id="content" class="flex_row">
      <section class="left_section_module flex_w_4">
          <section class="modules">
              <h1 class="module_heading">List of Courses</h1>
              <?php flash('register_success'); ?>
              <?php flash('register_error'); ?>
              <div class="myclasses_container" data-simplebar>
                   <?php foreach ($data['classes'] as $class): ?>

                        <div class="myclass_wrap">
                             <?php $course = $data['courses'][$class['course_id']]; ?>
                             <?php $department = $data['departments'][$course['department_id']]; ?>
                             <div class="myclass_image" style="<?php echo $data['background'][$class['id']]; ?>"></div>
                             <div class="myclass_info">

                                  <?php if (isStudent()): ?>
                                       <div class="myclass_teacher" style="background-image: url(<?php echo $data['teachers'][$class['teacher_id']]['avatar']; ?>);"></div>
                                  <?php endif; ?>

                                  <h2><?php echo $department['shortname'] . $course['id'] . ' - ' . $class['section']; ?></h2>
                                  <h1><?php echo $course['name']; ?></h1>
                                  <a href="<?php echo ROOT . 'classes/view/' . $class['id']; ?>" class="btn btn_red">View Class</a>
                             </div>
                        </div>

                   <?php endforeach; ?>

              </div>
          </section>
      </section>
      <section class="right_section_module">
          <section class="modules user_stats_module">
              <h1 class="module_heading">Courses / Classes Stats</h1>
              <div class="stats_container">
                   <?php if (isTeacher()): ?>
                        <ul>
                            <li>Total Courses: 4</li>
                            <li>Total Credits: 12</li>
                       </ul>

                      <div id="semester_progress"></div>

                   <?php endif; ?>
              </div>
          </section>
          <section class="modules department_list_module">
              <h1 class="module_heading">Semesters</h1>
              <ul data-simplebar>
                   <?php $semesters = ['SPR2018','FALL2017','SPR2017','FALL2016','SPR2016','FALL2015','SPR2015']; ?>
                   <?php foreach ($semesters as $semester): ?>
                        <li><a href="<?php echo ROOT . 'myclasses/view/' . $semester; ?>" class="<?php echo ($data['semester'] == $semester) ? 'selected' : false; ?>"><?php echo $semester; ?></a></li>
                   <?php endforeach; ?>
              </ul>
          </section>
      </section>
</section>
<!-- #website -->

<?php require APP . 'views/layouts/portal/footer.php'; ?>
