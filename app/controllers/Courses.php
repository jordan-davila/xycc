<?php
  class Courses extends Controller
  {
      public function __construct()
      {
          //Check Model
          $this->courseModel = $this->model('Course');
          $this->classModel = $this->model('ClassModel');
          $this->userModel = $this->model('User');
          $this->departmentModel = $this->model('Department');
      }


      public function index($department_id = 'all')
      {
          $departments = $this->departmentModel->findAll();

           if ($department_id == 'all') {
                $courses = $this->courseModel->findAllPag();

                foreach ($courses['courses'] as $course) {
                     $course_departments[$course['id']] = $this->departmentModel->findById($course['department_id']);
                }

                // var_dump($course_departments);

                $data = [
                 'title' => 'Courses',
                 'department_name' => $department_id,
                 'courses' => $courses['courses'],
                 'course_departments' => $course_departments,
                 'departments' => $departments,
                 'pagination' => $courses['paginationLinks']
                ];

           } else {
                $courses = $this->courseModel->findByDepartment($department_id);

                foreach ($courses as $course) {
                     $course_departments[$course['id']] = $this->departmentModel->findById($course['department_id']);
                }

                // var_dump($course_departments);

                $data = [
                 'title' => 'Courses',
                 'department_name' => $department_id,
                 'courses' => $courses,
                 'course_departments' => $course_departments,
                 'departments' => $departments,
                 'pagination' => null
                ];
           }

          $this->view('courses/index', $data);
      }

      // TODO: Get latest semester
      public function getCourse($id, $semester = 'SPR2018'){

           // Get Course Value
           $course = $this->courseModel->findById($id);
           $classes = $this->classModel->findByCourseSemester($id, $semester);
           $departments = $this->departmentModel->findAll();
           $allTeachers = $this->userModel->findAllByRole('teacher');

           foreach ($classes as $class) {
                $teachers[$class['teacher_id']] = $this->userModel->findById($class['teacher_id']);
           }

           $data = [
            'title' => 'Edit Courses: ' . $id,
            'semester' => $semester,
            'course' => $course,
            'classes' => $classes,
            'teachers' => $teachers,
            'allTeachers' => $allTeachers,
            'departments' => $departments
           ];

           $this->view('courses/edit', $data);
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
  }
