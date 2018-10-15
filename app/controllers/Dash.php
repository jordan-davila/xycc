<?php
  class Dash extends Controller
  {
      public function __construct()
      {
          //Check Model
          $this->courseModel = $this->model('Course');
          $this->classModel = $this->model('ClassModel');
          $this->classStudentModel = $this->model('ClassStudent');
          $this->departmentModel = $this->model('Department');
          $this->userModel = $this->model('User');
          $this->assignmentModel = $this->model('Assignment');
          $this->submissionModel = $this->model('Submission');
          $this->submissionGradeModel = $this->model('SubmissionGrade');
      }

      public function index()
      {

           if (isset($_GET['semester'])) {
                $semester = $_GET['semester'];
           } else {
                $semester = 'SPR2018';
           }

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
                $data['departments'][$course['department_id']] = $this->departmentModel->findById($course['department_id']);
           }

           $data['title'] = 'Dashboard';
           $data['semester'] = $semester;
           $data['classes'] = $classes;
           $data['courses'] = $courses;
           $data['teachers'] = $teachers;
           $data['background'] = $background;

          $this->view('dash/index', $data);
      }

      private function checkBGTheme($picture_theme){
          if (empty($picture_theme)) {
               return 'background: linear-gradient(90deg, #A747B4, #E43F48);';
          } else {
               return 'background-image: url(' . $picture_theme . ');';
          }
     }
  }
