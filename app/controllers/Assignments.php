<?php
  class Assignments extends Controller
  {
      public function __construct()
      {
          //Check Model
          $this->courseModel = $this->model('Course');
          $this->classModel = $this->model('ClassModel');
          $this->userModel = $this->model('User');
          $this->assignmentModel = $this->model('Assignment');
          $this->submissionModel = $this->model('Submission');
      }

      // Get all assignments from class_id
      public function getByClassId($class_id)
      {
          // Get Class Data
          $class = $this->classModel->findById($class_id);
          $course = $this->courseModel->findById($class['course_id']);
          $teacher = $this->userModel->findById($class['teacher_id']);
          $assignments = $this->assignmentModel->findByClassId($class_id);
          $background = $this->checkBGTheme($class['picture_theme']);

          foreach ($assignments as $assignment) {
               if (isTeacher() || isAdmin()) {
                     $data['submission_count'][$assignment['id']] = $this->submissionModel->countByAssignment($assignment['id']);

               } else {
                     $data['submission'][$assignment['id']] = $this->submissionModel->findByAssignment($assignment['id']);
               }
          }

          // Get: Show all Users with Pagination
           $data['title'] = 'Classes / ' . $course['name'] . '/ Assignments';
           $data['subtitle'] = 'Assignments';
           $data['class'] = $class;
           $data['assignments'] = $assignments;
           $data['teacher'] = $teacher;
           $data['background'] = $background;

          $this->view('assignments/view', $data);
      }


      // Get all assignments from class_id
     public function newAssignment($class_id)
     {
         // Get Class Data
         $class = $this->classModel->findById($class_id);
         $course = $this->courseModel->findById($class['course_id']);
         $teacher = $this->userModel->findById($class['teacher_id']);
         $background = $this->checkBGTheme($class['picture_theme']);

         // Get: Show all Users with Pagination
         $data = [
          'title' => 'Classes / ' . $course['name'] . '/ Assignments',
          'subtitle' => 'Assignments',
          'class' => $class,
          'teacher' => $teacher,
          'background' => $background
         ];

         $this->view('assignments/create', $data);
     }

     public function getAssignment($assignment_id)
     {
         // Get Class Data
         $assignment = $this->assignmentModel->findById($assignment_id);
         $class = $this->classModel->findById($assignment['class_id']);
         $course = $this->courseModel->findById($class['course_id']);
         $teacher = $this->userModel->findById($class['teacher_id']);
         $background = $this->checkBGTheme($class['picture_theme']);

         // Get: Show all Users with Pagination
         $data = [
          'title' => 'Classes / ' . $course['name'] . '/ Assignment /' . $assignment_id,
          'subtitle' => 'Assignments',
          'class' => $class,
          'teacher' => $teacher,
          'assignment' => $assignment,
          'background' => $background
         ];

         $this->view('assignments/edit', $data);
     }

     public function postAssignment($class_id)
     {

         // Get: Show all Users with Pagination
         $data = [
          'name' => $_POST['title'],
          'class_id' => $class_id,
          'due_date' => date("Y-m-d H:i:s",strtotime($_POST['due_date'])),
          'visible' => $_POST['visible'],
          'description' => $_POST['description'],
          'date_created' => date("Y-m-d H:i:s", time()),
          'last_updated' => date("Y-m-d H:i:s", time())
         ];

         if ($this->assignmentModel->create($data)) {
              flash('assignment_success', 'The assignment has been added successfully', 'alert_success margin_none');
              redirect('assignments/view/' . $class_id);
         } else {
              flash('assignment_error', 'There was an error creating your assignment. Please try again.', 'alert_error margin_none');
              redirect('assignments/view/' . $class_id);
         }


     }

     public function putAssignment($assignment_id)
     {
         $assignment = $this->assignmentModel->findById($assignment_id);

         // Get: Show all Users with Pagination
         $data = [
          'id' => $assignment_id,
          'name' => $_POST['title'],
          'class_id' => $assignment['class_id'],
          'due_date' => date("Y-m-d H:i:s",strtotime($_POST['due_date'])),
          'visible' => $_POST['visible'],
          'description' => $_POST['description'],
          'last_updated' => date("Y-m-d H:i:s", time())
         ];

         if ($this->assignmentModel->update($data)) {
              flash('assignment_success', 'The assignment has been updated successfully', 'alert_success margin_none');
              redirect('assignments/edit/' . $assignment_id);
         } else {
              flash('assignment_error', 'There was an error updating your assignment. Please try again.', 'alert_error margin_none');
              redirect('assignments/edit/' . $assignment_id);
         }
     }

     public function deleteAssignment($assignment_id)
     {
          $assignment = $this->assignmentModel->findById($assignment_id);

         if ($this->assignmentModel->delete($assignment_id)) {
              flash('assignment_success', 'The assignment has been deleted successfully', 'alert_success margin_none');
              redirect('assignments/view/' . $assignment['class_id']);
         } else {
              flash('assignment_error', 'There was an error deleting your assignment. Please try again.', 'alert_error margin_none');
              redirect('assignments/view/' . $assignment['class_id']);
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
