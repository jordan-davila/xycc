<?php

/**
 * User Model Class
 */

class User
{
  // Classes
  private $db;
  private $pagination;

  public function __construct()
  {
    $this->db = new Database;
  }

  /**
   * This funstion uses the Pagination Helper class. Its goal is to
   * find all users, divide the list of users by the limit [$_GET]
   * return a list of user and return a list of pagination links.
   * @return array Returns two arrays. A user list and html pagination links.
   */
  public function findAllUsersPag(){

    //Set Parameters
    $query = "SELECT * FROM users ORDER BY CASE WHEN role = 'admin' THEN '1' WHEN role = 'teacher' THEN '2' ELSE role END, first_name ASC";
    $total = $this->db->rowCountExecute($query);
    $page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
    $links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;

    // Call Pagination Class
    $this->pagination = new Pagination($query, $total, $page, $limit, $links);
    $this->db->query($this->pagination->getData());

    // Return UserList and Pagination Links HTML into Array
    return $array = ['userList' => $this->db->resultset(), 'paginationLinks' => $this->pagination->createLinks()];
  }

  /**
   * Returns an array of a single user. Finds the user by the selected id.
   * @param int Id
   * @return array Returns an array of a single user
   */
  public function findById($id){
    $query = 'SELECT * FROM users WHERE id = :id';
    $this->db->query($query);
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function findAllByRole($role){
    $query = 'SELECT * FROM users WHERE role = :role';
    $this->db->query($query);
    $this->db->bind(':role', $role);
    return $this->db->resultset();
  }

  public function registerUser($data) {
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

    if($this->db->execute()){
      // $id = $this->db->lastInsertId();
      // Send email verification link
      // $activation_link = ROOT . "users/activate/?code=" . $activation_code . '?user=' . $id;
      // Return to Model
      return true;
    } else {
      return false;
    }
  }

  public function editUser($data) {
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

    if($this->db->execute()){
      // $id = $this->db->lastInsertId();
      // Send email verification link
      // $activation_link = ROOT . "users/activate/?code=" . $activation_code . '?user=' . $id;
      // Return to Model
      return true;
    } else {
      return false;
    }
  }


  public function delete($id){
       $query = 'DELETE FROM users WHERE id = :id';
       $this->db->query($query);
       $this->db->bind(':id', $id);

       if($this->db->execute()){
         return true;
       } else {
         return false;
       }
 }

  public function userRoleCount($role){
    $query = "SELECT id FROM users WHERE role = :role";
    $this->db->query($query);
    $this->db->bind(':role', $role);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function userGenderCount($gender){
    $query = "SELECT id FROM users WHERE gender = :gender";
    $this->db->query($query);
    $this->db->bind(':gender', $gender);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function allUserCount(){
    $query = "SELECT id FROM users";
    $this->db->query($query);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function login($email, $password){
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();
    $hashed_password = $row['password'];

    if(Bcrypt::checkPassword($password, $hashed_password)){
      return $row;
    } else {
      return false;
    }
  }

  // Find user by email
  public function findUserByEmail($email){
    $this->db->query('SELECT id FROM users WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $this->db->single();

    // Check row
    if($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }

}

?>
