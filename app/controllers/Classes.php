<?php
  class Classes extends Controller
  {
      public function __construct()
      {
          //Check Model
          $this->courseModel = $this->model('Course');
          $this->classModel = $this->model('ClassModel');
          $this->userModel = $this->model('User');
          $this->departmentModel = $this->model('Department');
          $this->classStudentModel = $this->model('ClassStudent');
      }

      public function getClass($id)
      {

          // Get Class Data
          $class = $this->classModel->findById($id);
          $course = $this->courseModel->findById($class['course_id']);
          $teacher = $this->userModel->findById($class['teacher_id']);
          $background = $this->checkBGTheme($class['picture_theme']);


          // Get: Show all Users with Pagination
          $data = [
           'title' => 'Classes / ' . $course['name'],
           'subtitle' => 'Home',
           'course' => $course,
           'class' => $class,
           'teacher' => $teacher,
           'background' => $background
          ];

          $this->view('classes/view', $data);
      }

      public function getMyClasses($semester = 'SPR2018') {

           // Get Class Data
           if (isTeacher()) {
                $classes = $this->classModel->findByTeacherSemester($_SESSION['user_id'], $semester);
           }

           if (isStudent()) {

                $registeredClasses = $this->classStudentModel->findByStudentSemester($_SESSION['user_id'], $semester);

                foreach ($registeredClasses as $class) {
                     $classes[] = $this->classModel->findById($class['class_id']);
                }

           }


           // Fetch Data
           foreach ($classes as $class) {
                $courses[$class['course_id']] = $this->courseModel->findById($class['course_id']);
                $teachers[$class['teacher_id']] = $this->userModel->findById($class['teacher_id']);
                $background[$class['id']] = $this->checkBGTheme($class['picture_theme']);
           }

           foreach ($courses as $course) {
                $departments[$course['department_id']] = $this->departmentModel->findById($course['department_id']);
           }

           $data = [
                'title' => 'My Classes / ' . $semester,
                'semester' => $semester,
                'classes' => $classes,
                'courses' => $courses,
                'teachers' => $teachers,
                'background' => $background,
                'departments' => $departments
           ];

           $this->view('classes/myclasses', $data);
      }

      // Functions
      private function isErrors($errors)
      {
          foreach ($errors as $key => $value) {
              if (!empty($value)) {
                  return true;
              } else {
                  return false;
              }
          }
      }

      private function checkBGTheme($picture_theme){
           if (empty($picture_theme)) {
                return 'background: linear-gradient(90deg, #A747B4, #E43F48);';
           } else {
                return 'background-image: url(' . $picture_theme . ');';
           }
      }

  }
