<?php

/**
 * User Model Class
 */

class Submission
{
    // Classes
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findByClassId($class_id){

      //Set Parameters
      $query = 'SELECT * FROM submissions WHERE class_id = :class_id ORDER BY date_due DESC';
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
        $query = 'SELECT * FROM submissions WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function findByAssignment($id)
    {
        $query = 'SELECT * FROM submissions WHERE assignment_id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->resultset();
    }

    public function countByAssignment($id)
    {
        $query = 'SELECT id FROM submissions WHERE assignment_id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function createSubmission($data)
    {
        $query = 'INSERT INTO submissions ';
        $query .= '( user_id, assignment_id, text, filename )';
        $query .= ' VALUES ( :user_id, :assignment_id, :text, :filename);';

        $this->db->query($query);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':assignment_id', $data['assignment_id']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':filename', $data['filename']);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = 'DELETE FROM users WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
