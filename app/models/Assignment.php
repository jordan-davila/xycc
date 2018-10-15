<?php

/**
 * User Model Class
 */

class Assignment
{
    // Classes
    private $db;
    private $pagination;
    private $table_name = "assignments";

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

    public function create($data)
    {
        $query = 'INSERT INTO assignments ';
        $query .= '( class_id, name, description, visible, date_due, date_created, last_updated )';
        $query .= ' VALUES ( :class_id, :name, :description, :visible, :due_date, :date_created, :last_updated );';

        $this->db->query($query);
        $this->db->bind(':class_id', $data['class_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':visible', $data['visible']);
        $this->db->bind(':due_date', $data['due_date']);
        $this->db->bind(':date_created', $data['date_created']);
        $this->db->bind(':last_updated', $data['last_updated']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $query = 'UPDATE assignments SET ';
        $query .= 'class_id = :class_id, ';
        $query .= 'name = :name, ';
        $query .= 'description = :description, ';
        $query .= 'visible = :visible, ';
        $query .= 'date_due = :date_due, ';
        $query .= 'last_updated = :last_updated ';
        $query .= 'WHERE id = :id;';

        $this->db->query($query);
        $this->db->bind(':class_id', $data['class_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':visible', $data['visible']);
        $this->db->bind(':date_due', $data['due_date']);
        $this->db->bind(':last_updated', $data['last_updated']);
        $this->db->bind(':id', $data['id']);

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
