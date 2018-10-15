<section class="right_section_module">
    <section class="modules user_stats_module flex_30_vh">
       <h1 class="module_heading">Professor Info</h1>
       <div class="profile_container margin_none">
               <div class="profile_picture" style="background-image: url('<?php echo $data['teacher']['avatar']; ?>');"></div>
               <a href="#" class="name"><?php echo ucwords($data['teacher']['first_name']) . ' ' . ucwords($data['teacher']['last_name']); ?></a>
               <div class="role">View Profile</div>
       </div>
    </section>
    <section class="modules department_list_module">
       <h1 class="module_heading">Menu</h1>
       <ul data-simplebar>
            <li><a href="<?php echo ROOT . 'classes/view/' . $data['class']['id']; ?>" class="<?php echo ($data['subtitle'] === 'Home') ? 'selected' : ''; ?>">Home</a></li>
            <li><a href="" class="">Attendance</a></li>
            <li><a href="<?php echo ROOT . 'assignments/view/' . $data['class']['id']; ?>" class="<?php echo ($data['subtitle'] === 'Assignments') ? 'selected' : ''; ?>">Assignments</a></li>
            <li><a href="" class="<?php echo ($data['subtitle'] === 'Tests & Quizzes') ? 'selected' : ''; ?>">Tests & Quizzes</a></li>
            <li><a href="" class="<?php echo ($data['subtitle'] === 'Resources') ? 'selected' : ''; ?>">Resources</a></li>
            <li><a href="" class="<?php echo ($data['subtitle'] === 'Class List') ? 'selected' : ''; ?>">Class List</a></li>
            <li><a href="" class="<?php echo ($data['subtitle'] === 'Grades') ? 'selected' : ''; ?>">Grades</a></li>
      </ul>
    </section>
</section>
