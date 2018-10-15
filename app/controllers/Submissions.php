<?php
  class Submissions extends Controller
  {
      public function __construct()
      {
          //Check Model
          $this->courseModel = $this->model('Course');
          $this->classModel = $this->model('ClassModel');
          $this->userModel = $this->model('User');
          $this->assignmentModel = $this->model('Assignment');
          $this->submissionModel = $this->model('Submission');
          $this->submissionGradeModel = $this->model('SubmissionGrade');
      }

      // Get all assignments from class_id
      public function getSubmission($assignment_id)
      {

          // Get Class Data
          $assignment = $this->assignmentModel->findById($assignment_id);
          $class = $this->classModel->findById($assignment['class_id']);
          $submissions = $this->submissionModel->findByAssignment($assignment_id);
          $course = $this->courseModel->findById($class['course_id']);
          $teacher = $this->userModel->findById($class['teacher_id']);
          $background = $this->checkBGTheme($class['picture_theme']);

          foreach ($submissions as $submission) {
              $data['student'][$submission['id']] = $this->userModel->findById($submission['user_id']);
              $data['grades'][$submission['id']] = $this->submissionGradeModel->findBySubmission($submission['id']);
          }

          // Get: Show all Users with Pagination

          $data['title'] = 'Classes / ' . $course['name'] . ' / Assignments' . ' / ' . $assignment_id;
          $data['subtitle'] = 'Assignments';
          $data['submissions'] = $submissions;
          $data['class'] = $class;
          $data['assignment'] = $assignment;
          $data['teacher'] = $teacher;
          $data['background'] = $background;

          $this->view('submissions/view', $data);
      }

      // Get all assignments from class_id
      public function newSubmission($assignment_id)
      {
          // Get Class Data
          $assignment = $this->assignmentModel->findById($assignment_id);
          $class = $this->classModel->findById($assignment['class_id']);
          $course = $this->courseModel->findById($class['course_id']);
          $teacher = $this->userModel->findById($class['teacher_id']);
          $background = $this->checkBGTheme($class['picture_theme']);

          // Get: Show all Users with Pagination
          $data = [
           'title' => 'Classes / ' . $course['name'] . ' / Assignments' . ' / ' . $assignment['id'],
           'subtitle' => 'Assignments',
           'class' => $class,
           'assignment' => $assignment,
           'teacher' => $teacher,
           'background' => $background
          ];

          $this->view('submissions/new', $data);
      }

      // Get all assignments from class_id
      public function reviewSubmission($submission_id)
      {
          // Get Class Data
          $submission = $this->submissionModel->findById($submission_id);
          $assignment = $this->assignmentModel->findById($submission['assignment_id']);
          $class = $this->classModel->findById($assignment['class_id']);
          $course = $this->courseModel->findById($class['course_id']);
          $teacher = $this->userModel->findById($class['teacher_id']);
          $background = $this->checkBGTheme($class['picture_theme']);

          $grade = $this->submissionGradeModel->findBySubmission($submission['id']);

          // Get: Show all Users with Pagination
          $data = [
          'title' => 'Classes / ' . $course['name'] . ' / Assignments' . ' / Review / ' . $assignment['id'],
          'subtitle' => 'Assignments',
          'class' => $class,
          'assignment' => $assignment,
          'submission' => $submission,
          'grade' => $grade,
          'teacher' => $teacher,
          'background' => $background
         ];

          $this->view('submissions/review', $data);
      }

      public function postSubmission($assignment_id)
      {

          // TODO: Check if user is permited to submit assignment
          // 1. Check if user is registered to class
          // 2. Check if user hasn't submitted this assignment

          if (!empty($_FILES['file'])) {
              $filename = str_replace(' ', '_', $_FILES["file"]["name"]);
              $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
               $file_ext = substr($filename, strripos($filename, '.')); // get file name
               $filesize = $_FILES["file"]["size"];
              $allowed_file_types = array('.doc','.docx','.rtf','.pdf', '.zip', '.rar', '.png', '.jpg', '.xls', '.csv');

              if (!(in_array($file_ext, $allowed_file_types)) && !($filesize < 200000)) {
                  flash('submission_error', 'The file type must be docx, pdf or zip. The filesize must not be greater than 20MB. Please try again.', 'alert_error');
                  redirect('submission/new/' . $assignment_id);
              }
          } else {
              $filename = null;
          }

          $data = [
               'user_id' => $_SESSION['user_id'],
               'assignment_id' => $assignment_id,
               'text' => trim($_POST['text']),
               'filename' => $filename
          ];

          // TODO: To make this more functional, its best to store all the files on a different database.
          // This way we can keep track of repeated submission or repeated filenames.

          if ($submission_id = $this->submissionModel->createSubmission($data)) {

              // If no file was intended to be submitted
              if (empty($filename)) {
                  flash('submission_success', 'Assignment Submitted');
                  redirect('submissions/review/' . $submission_id);
             } else {

                   // If file was meant to be uploaded.
                   if (move_uploaded_file($_FILES["file"]["tmp_name"], APP . "uploads/submissions/" . $filename)) {
                       flash('submission_success', 'Assignment Submitted & File Uploaded Successfully');
                       redirect('submissions/review/' . $submission_id);
                   } else {
                       flash('submission_error', 'The file failed to upload, please try again.', 'alert_error');
                       redirect('submissions/new/' . $assignment_id);
                   }
               }
          }
      }

      public function download($filename)
      {

          // Check if the user is allowed to download.
          // NOTE: The teacher assigned to the class should be allowed to download this file.
          // The student with the corresponding user_id should be alowed to download.
          // The admin can download whatever he wants.

          $entire_path = APP . "uploads/submissions/" . $filename;
          header('Content-Description: File Transfer');
          header('Content-Type: ' . mime_content_type($entire_path));
          header('Content-Disposition: filename="'. $filename .'"');
          readfile($entire_path);
          die();
      }

      private function checkBGTheme($picture_theme)
      {
          if (empty($picture_theme)) {
              return 'background: linear-gradient(90deg, #A747B4, #E43F48);';
          } else {
              return 'background-image: url(' . $picture_theme . ');';
          }
      }
  }
