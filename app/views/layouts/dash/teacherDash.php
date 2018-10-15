<section class="top_section_module">
     <!-- Recent Courses -->
     <section class="modules">
          <div class="module_heading_options">
               <h1>My Courses</h1>
               <select class="semester_selector">
                    <option value="http://xycc.test/courses/edit/010/SPR2018" selected="">SPR2018</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2018">FALL2018</option>
                    <option value="http://xycc.test/courses/edit/010/SPR2017">SPR2017</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2017">FALL2017</option>
                    <option value="http://xycc.test/courses/edit/010/SPR2016">SPR2016</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2016">FALL2016</option>
                    <option value="http://xycc.test/courses/edit/010/SPR2015">SPR2015</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2015">FALL2015</option>
                    <option value="http://xycc.test/courses/edit/010/SPR2014">SPR2014</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2014">FALL2014</option>
               </select>
          </div>
          <div class="module_list_container margin_bottom_20" data-simplebar>
               <?php foreach ($data['classes'] as $class): ?>
                    <?php $course = $data['courses'][$class['course_id']]; ?>
                    <?php $department = $data['departments'][$course['department_id']]; ?>
                    <?php $teacher = $data['teachers'][$class['teacher_id']]; ?>
                    <a href="<?php echo ROOT . 'classes/view/' . $class['id']; ?>" class="module_list">
                         <div class="left_line_hover active"></div>
                         <div class="list_image" style="<?php echo $data['background'][$class['id']]; ?>"></div>
                         <div class="list_info">
                              <h1><?php echo $course['name']; ?></h1>
                              <h2><?php echo $department['shortname'] . $course['id'] . ' - ' . $class['section']  . ' | ' . $data['semester']; ?></h2>
                              <h2><?php echo $teacher['first_name'] . ' ' . $teacher['last_name'];?></h2>
                         </div>
                    </a>

               <?php endforeach; ?>
          </div>
     </section>
     <!-- Weather : Might Use Later -->
     <!-- <section class="modules flex_column_center">
       <div class="weather_icon" style="background-image: url('<?php echo ROOT . 'img/icons/weather.png'; ?>');"></div>
       <div class="day">Monday</div>
       <div class="date">January 17, 2018</div>
     </section> -->
     <!-- Recent Assignment -->
     <section class="modules">
          <div class="module_heading_options">
               <h1>Assignments to Grade</h1>
               <select class="semester_selector">
                    <option value="http://xycc.test/courses/edit/010/SPR2018" selected="">SPR2018</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2018">FALL2018</option>
                    <option value="http://xycc.test/courses/edit/010/SPR2017">SPR2017</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2017">FALL2017</option>
                    <option value="http://xycc.test/courses/edit/010/SPR2016">SPR2016</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2016">FALL2016</option>
                    <option value="http://xycc.test/courses/edit/010/SPR2015">SPR2015</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2015">FALL2015</option>
                    <option value="http://xycc.test/courses/edit/010/SPR2014">SPR2014</option>
                    <option value="http://xycc.test/courses/edit/010/FALL2014">FALL2014</option>
               </select>
          </div>
          <div class="module_list_container margin_bottom_20" data-simplebar>

               <a href="<?php echo ROOT; ?>" class="module_list">
                    <div class="left_line_hover"></div>
                    <div class="list_image" style="background-image: url(<?php echo ROOT . 'img/users/4.jpg'; ?>)"></div>
                    <div class="list_info">
                         <h1><span class="completed"></span>Networking Fundamentals</h1>
                         <h2>Assignment #3 | Due: Mar 15, 2018</h2>
                         <h2>Not Yet Completed</h2>
                    </div>
               </a>
               <a href="<?php echo ROOT; ?>" class="module_list">
                    <div class="left_line_hover"></div>
                    <div class="list_image" style="background-image: url(<?php echo ROOT . 'img/users/4.jpg'; ?>)"></div>
                    <div class="list_info">
                         <h1><span class="completed"></span>Networking Fundamentals</h1>
                         <h2>Assignment #3 | Due: Mar 15, 2018</h2>
                         <h2>Not Yet Completed</h2>
                    </div>
               </a>
               <a href="<?php echo ROOT; ?>" class="module_list">
                    <div class="left_line_hover"></div>
                    <div class="list_image" style="background-image: url(<?php echo ROOT . 'img/users/1.jpg'; ?>)"></div>
                    <div class="list_info">
                         <h1><span class="completed"></span>Networking Fundamentals</h1>
                         <h2>Assignment #3 | Due: Mar 15, 2018</h2>
                         <h2>Not Yet Completed</h2>
                    </div>
               </a>
          </div>
     </section>
     <!-- Major Progress -->
     <section class="modules flex_column_top_center">
          <h1 class="module_heading">Staffroom</h1>
          <div class="module_list_container margin_bottom_20" data-simplebar>
               <a href="<?php echo ROOT; ?>" class="module_list">
                    <div class="left_line_hover active"></div>
                    <!-- <div class="list_image" style="background-image: url(<?php echo ROOT . 'img/users/1.jpg'; ?>)"></div> -->
                    <div class="list_info">
                         <h1><span class="completed"></span>How to Upload Assignments?</h1>
                         <h2>Assignment #3 | Due: Mar 15, 2018</h2>
                         <h2>Not Yet Completed</h2>
                    </div>
               </a>
               <a href="<?php echo ROOT; ?>" class="module_list">
                    <div class="left_line_hover"></div>
                    <!-- <div class="list_image" style="background-image: url(<?php echo ROOT . 'img/users/2.jpg'; ?>)"></div> -->
                    <div class="list_info">
                         <h1><span class="completed"></span>XYCC Startup Guide</h1>
                         <h2>Assignment #3 | Due: Mar 15, 2018</h2>
                         <h2>Not Yet Completed</h2>
                    </div>
               </a>
               <a href="<?php echo ROOT; ?>" class="module_list">
                    <div class="left_line_hover"></div>
                    <!-- <div class="list_image" style="background-image: url(<?php echo ROOT . 'img/users/3.jpg'; ?>)"></div> -->
                    <div class="list_info">
                         <h1><span class="completed"></span>Test and Resources</h1>
                         <h2>Assignment #3 | Due: Mar 15, 2018</h2>
                         <h2>Not Yet Completed</h2>
                    </div>
               </a>
               <a href="<?php echo ROOT; ?>" class="module_list">
                    <div class="left_line_hover"></div>
                    <!-- <div class="list_image" style="background-image: url(<?php echo ROOT . 'img/users/1.jpg'; ?>)"></div> -->
                    <div class="list_info">
                         <h1><span class="completed"></span>Networking Fundamentals</h1>
                         <h2>Assignment #3 | Due: Mar 15, 2018</h2>
                         <h2>Not Yet Completed</h2>
                    </div>
               </a>
          </div>
     </section>
</section>
