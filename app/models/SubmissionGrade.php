<?php

/**
 * User Model Class
 */

class SubmissionGrade
{
    // Classes
    private $db;
    private $pagination;
    private $table_name = "submission_grade";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findByClassId($class_id){

      //Set Parameters
      $query = 'SELECT * FROM ' . $this->table_name . ' WHERE class_id = :class_id ORDER BY date_due DESC';
      $this->db->query($query);
      $this->db->bind(':class_id', $class_id);
      return $this->db->resultset();
    }

    /**
     * Returns an array of a single user. Finds the user by the selected id.
     * @param int Id
     * @return array Returns an array of a single user
     */
    public function findById($id)
    {
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function findBySubmission($submission_id){
        $query = 'SELECT * FROM ' . $this->table_name . ' WHERE submission_id = :submission_id';
        $this->db->query($query);
        $this->db->bind(':submission_id', $submission_id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = 'INSERT INTO ' . $this->table_name;
        $query .= ' ( submission_id, grade, feedback )';
        $query .= ' VALUES ( :submission_id, :grade, :feedback );';

        $this->db->query($query);
        $this->db->bind(':submission_id', $data['submission_id']);
        $this->db->bind(':grade', $data['grade']);
        $this->db->bind(':feedback', $data['feedback']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $query = 'UPDATE ' .  $this->table_name . ' SET ';
        $query .= 'submission_id = :submission_id, ';
        $query .= 'grade = :grade, ';
        $query .= 'feedback = :feedback ';
        $query .= 'WHERE id = :id;';

        $this->db->query($query);
        $this->db->bind(':submission_id', $data['submission_id']);
        $this->db->bind(':grade', $data['grade']);
        $this->db->bind(':feedback', $data['feedback']);
        $this->db->bind(':id', $data['grade_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = 'DELETE FROM ' . $this->table_name . ' WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findAll()
    {
        $query = "SELECT * FROM ' . $this->table_name . ' ORDER BY SUBSTRING(semester, -4) DESC, semester DESC, course_id ASC, section ASC";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultset();
    }

    public function findBySemester($semester){
        $query = "SELECT * FROM ' . $this->table_name . ' WHERE semester = :semester ORDER BY course_id ASC, section ASC";
        $this->db->query($query);
        $this->db->bind(':semester', trim($semester));
        $this->db->execute();
        return $this->db->resultset();
    }

    public function findByCourseSemester($course_id, $semester){
        $query = "SELECT * FROM ' . $this->table_name . ' WHERE course_id = :course_id AND semester = :semester ORDER BY section ASC";
        $this->db->query($query);
        $this->db->bind(':course_id', $course_id);
        $this->db->bind(':semester', trim($semester));
        $this->db->execute();
        return $this->db->resultset();
    }

    public function total()
    {
        $query = "SELECT id FROM ' . $this->table_name . '";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
