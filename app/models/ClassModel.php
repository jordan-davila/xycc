<?php

/**
 * User Model Class
 */

class ClassModel
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
      $query = 'SELECT * FROM classes ORDER BY SUBSTRING(semester, -4) DESC, semester DESC, course_id ASC, section ASC';
      $total = $this->db->rowCountExecute($query);
      $page  = ( isset( $_GET['page'] ) ) ? trim($_GET['page']): 1;
      $limit = ( isset( $_GET['limit'] ) ) ? trim($_GET['limit']) : 25;
      $links = ( isset( $_GET['links'] ) ) ? trim($_GET['links']) : 7;

      // Call Pagination Class
      $this->pagination = new Pagination($query, $total, $page, $limit, $links);
      $this->db->query($this->pagination->getData());

      // Return UserList and Pagination Links HTML into Array
      return $array = ['classes' => $this->db->resultset(), 'paginationLinks' => $this->pagination->createLinks()];
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

    public function findByTeacherSemester($id, $semester){
         $query = 'SELECT * FROM classes WHERE teacher_id = :id AND semester = :semester ORDER BY course_id';
         $this->db->query($query);
         $this->db->bind(':id', $id);
         $this->db->bind(':semester', $semester);
         return $this->db->resultset();
    }
    public function registerUser($data)
    {
        $query = 'INSERT INTO users ';
        $query .= '( first_name, last_name, email, password, role, gender, avatar, address, city, state, zip, phone, activation_code, active )';
        $query .= ' VALUES ( :first_name, :last_name, :email, :password, :role, :gender, :avatar, :address, :city, :state, :zip, :phone, :activation_code, :active );';

        $this->db->query($query);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':zip', $data['zip']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':activation_code', $data['activation_code']);
        $this->db->bind(':active', 0);

        if ($this->db->execute()) {
            // $id = $this->db->lastInsertId();
            // Send email verification link
            // $activation_link = ROOT . "users/activate/?code=" . $activation_code . '?user=' . $id;
            // Return to Model
            return true;
        } else {
            return false;
        }
    }

    public function editUser($data)
    {
        $query = 'UPDATE users SET ';
        $query .= 'first_name = :first_name, ';
        $query .= 'last_name = :last_name, ';
        $query .= 'email = :email, ';
        $query .= 'role = :role, ';
        $query .= 'gender = :gender, ';
        $query .= 'address = :address, ';
        $query .= 'city = :city, ';
        $query .= 'state = :state, ';
        $query .= 'zip = :zip, ';
        $query .= 'phone = :phone ';
        $query .= 'WHERE id = :id';

        $this->db->query($query);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':zip', $data['zip']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()) {
            // $id = $this->db->lastInsertId();
            // Send email verification link
            // $activation_link = ROOT . "users/activate/?code=" . $activation_code . '?user=' . $id;
            // Return to Model
            return true;
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

    public function findAll()
    {
        $query = "SELECT * FROM classes ORDER BY SUBSTRING(semester, -4) DESC, semester DESC, course_id ASC, section ASC";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultset();
    }

    public function findBySemester($semester){
        $query = "SELECT * FROM classes WHERE semester = :semester ORDER BY course_id ASC, section ASC";
        $this->db->query($query);
        $this->db->bind(':semester', trim($semester));
        $this->db->execute();
        return $this->db->resultset();
    }

    public function findByCourseSemester($course_id, $semester){
        $query = "SELECT * FROM classes WHERE course_id = :course_id AND semester = :semester ORDER BY section ASC";
        $this->db->query($query);
        $this->db->bind(':course_id', $course_id);
        $this->db->bind(':semester', trim($semester));
        $this->db->execute();
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
