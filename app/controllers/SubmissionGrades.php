<?php
  class SubmissionGrades extends Controller
  {
      public function __construct()
      {
          //Check Model
          $this->courseModel = $this->model('Course');
          $this->classModel = $this->model('ClassModel');
          $this->userModel = $this->model('User');
          $this->assignmentModel = $this->model('Assignment');
          $this->submissionGradeModel = $this->model('SubmissionGrade');
      }


     public function postGrade($submission_id)
     {

         // Get: Show all Users with Pagination
         $data = [
          'submission_id' => $submission_id,
          'grade' => $_POST['grade'],
          'feedback' => $_POST['feedback']
         ];

         if ($this->submissionGradeModel->create($data)) {
              flash('submission_success', 'The submission has been graded successfully', 'alert_success margin_none');
              redirect('submissions/view/' . $_POST['assignment_id']);
         } else {
              flash('submission_error', 'There was an error grading the submission. Please try again.', 'alert_error margin_none');
              redirect('submissions/view/' . $_POST['assignment_id']);
         }

     }


     public function putGrade($id){ // Submission Grade ID
          $grade = $this->submissionGradeModel->findById($id);

          $data = [
               'grade_id' => $id,
               'submission_id' => $grade['submission_id'],
               'grade' => $_POST['grade'],
               'feedback' => $_POST['feedback']
          ];

          if ($this->submissionGradeModel->update($data)) {
              flash('submission_success', 'Grade has been updated successfully', 'alert_success margin_none');
              redirect('submissions/view/' . $_POST['assignment_id']);
         } else {
              flash('submission_error', 'There was an error updating your grade. Please try again.', 'alert_error margin_none');
              redirect('submissions/view/' . $_POST['assignment_id']);
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
