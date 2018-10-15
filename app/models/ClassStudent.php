<?php

/**
 * User Model Class
 */

class ClassStudent
{
    // Classes
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    /**
     * Returns an array of a single user. Finds the user by the selected id.
     * @param int Id
     * @return array Returns an array of a single user
     */
    public function findById($id)
    {
        $query = 'SELECT * FROM classes WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


    public function findByStudentSemester($student_id, $semester){
        $query = 'SELECT * FROM class_student WHERE semester = :semester AND student_id = :student_id;';
        $this->db->query($query);
        $this->db->bind(':semester', $semester);
        $this->db->bind(':student_id', $student_id);
        return $this->db->resultset();
    }

    public function total()
    {
        $query = "SELECT id FROM classes";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
