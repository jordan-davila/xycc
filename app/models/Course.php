<?php

/**
 * Course Model Class
 */

class Course
{
    // Classes
    private $db;
    private $pagination;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllPag(){

      //Set Parameters
      $query = "SELECT * FROM courses ORDER BY department_id";
      $total = $this->db->rowCountExecute($query);
      $page  = ( isset( $_GET['page'] ) ) ? trim($_GET['page']): 1;
      $limit = ( isset( $_GET['limit'] ) ) ? trim($_GET['limit']) : 25;
      $links = ( isset( $_GET['links'] ) ) ? trim($_GET['links']) : 7;

      // Call Pagination Class
      $this->pagination = new Pagination($query, $total, $page, $limit, $links);
      $this->db->query($this->pagination->getData());

      // Return UserList and Pagination Links HTML into Array
      return $array = ['courses' => $this->db->resultset(), 'paginationLinks' => $this->pagination->createLinks()];
    }

    /**
     * Returns an array of a single user. Finds the user by the selected id.
     * @param int Id
     * @return array Returns an array of a single user
     */
    public function findById($id)
    {
        $query = 'SELECT * FROM courses WHERE id = :id';
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function delete($id)
    {
        $query = 'DELETE FROM courses WHERE id = :id';
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
        $query = "SELECT * FROM courses ORDER BY department_id";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultset();
    }

    public function findByDepartment($department_id){
         $query = 'SELECT * FROM courses WHERE department_id = :department_id';
         $this->db->query($query);
         $this->db->bind(':department_id', $department_id);
         return $this->db->resultset();
    }


    public function findBySemester($semester)
    {
        $query = "SELECT * FROM courses WHERE semester = :semester ORDER BY course_id ASC, section ASC";
        $this->db->query($query);
        $this->db->bind(':semester', trim($semester));
        $this->db->execute();
        return $this->db->resultset();
    }

    public function total()
    {
        $query = "SELECT id FROM courses";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
