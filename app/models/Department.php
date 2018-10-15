<?php

/**
 * User Model Class
 */

class Department
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
        $query = 'SELECT * FROM departments WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function findAll()
    {
        $query = "SELECT * FROM departments";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultset();
    }

    public function departmentCourseCount($id){
        $this->db->query("SELECT * FROM courses WHERE department_id = :id");
        $this->db->bind(':id', trim($id));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function total()
    {
        $query = "SELECT id FROM departments";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
