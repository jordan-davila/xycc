<?php
  class Users extends Controller
  {
      public function __construct()
      {
          //Check Model
          $this->userModel = $this->model('User');
      }

      // View and Register [GET/POST]
      public function getUsers()
      {

           // Results & Data
          $userResult = $this->userModel->findAllUsersPag();
          $userAdminCount = $this->userModel->userRoleCount('admin');
          $userTeacherCount = $this->userModel->userRoleCount('teacher');
          $userStudentCount = $this->userModel->userRoleCount('student');
          $totalUsers = $this->userModel->allUserCount();

          // Get: Show all Users with Pagination

          $data = [
          'title' => 'Users',
          'userList' => $userResult['userList'],
          'paginationLinks' => $userResult['paginationLinks'],
          'userAdminCount' => $userAdminCount,
          'userTeacherCount' => $userTeacherCount,
          'userStudentCount' => $userStudentCount,
          'totalUsers' => $totalUsers,
        ];

          $this->view('users/index', $data);
      }

      public function postUser()
      {
          $data = [
            'user' => [
               'first_name' => trim($_POST['first_name']),
               'last_name' => trim($_POST['last_name']),
               'email' => trim($_POST['email']),
               'password' => '', // Generate a random password after form validation
               'phone' => trim($_POST['phone']),
               'role' => trim($_POST['role']),
               'gender' => trim($_POST['gender']),
               'avatar' => '', // Generate an avatar after form validation
               'major' => trim($_POST['major']),
               'address' => trim($_POST['address']),
               'city' => trim($_POST['city']),
               'state' => trim($_POST['state']),
               'zip' => trim($_POST['zip']),
               'activation_code' =>   md5(uniqid("abcdefghijklmnopqrstuvwxyz", true))
            ],
            'errors' => [
               'first_name' => '',
               'last_name' => '',
               'email' => '',
               'phone' => '',
               'role' => '',
               'gender' => '',
               'major' => '',
               'address' => '',
               'city' => '',
               'state' => '',
               'zip' => ''
            ]
           ];

          // Validate Email
          if (empty($data['user']['email'])) {
              $data['errors']['email'] == 'Please enter Email';
          }

          // Validate First & Last Name
          if (empty($data['user']['first_name'])) {
              $data['errors']['first_name'] == 'Please enter First Name';
          }

          if (empty($data['user']['last_name'])) {
              $data['errors']['last_name'] == 'Please enter Last Name';
          }

          // Make sure all errors are empty before processing
          if (!$this->isErrors($data['errors'])) {

            // Generate Random Password
              $random_password = $this->randomPassword();
              $data['user']['password'] = Bcrypt::hashPassword($random_password);

              // Add an Avatar: Credits: ROBOHASH.ORG
              $data['user']['avatar'] = "https://robohash.org/" . $data['user']['email'];


              // Register User
              if ($this->userModel->registerUser($data['user'])) {

               // Start Flash message
                  $flash_message = 'Pass: '. $random_password .' - User has been Register. ';

                  // Try to send email
                  if ($this->mailCredentials($random_password, $data['user']['email'])) {
                      $flash_message .= 'Please Visit Email to Activate Account.';
                  } else {
                      $flash_message .= 'Unfortunetly, there was an error sending the email.';
                  }

                  //Display a flash message. Flash message is stored in a session.
                  flash('register_success', $flash_message);
                  redirect('users/');
              }

              // User has not been registered.
              else {
                  flash('register_error', 'Sorry Something went wrong.', 'alert_error');
                  redirect('users/');
              }
          }

          // Errors in form
          else {
              flash('register_error', 'Sorry, please fill out the form correctly.', 'alert_error');
              redirect('users/');
          }
      }

      public function getUser($id)
      {

        // Get: Show all Users
          $data = [
          'title' => 'Edit User: ' . $id,
          'userInfo' => $this->userModel->findById($id)
        ];

          $this->view('users/edit', $data);
      }

      public function putUser($id)
      {
          $data = [
             'title' => 'Edit User: ' . $id,
             'user' => [
               'id' => $id,
               'first_name' => trim($_POST['first_name']),
               'last_name' => trim($_POST['last_name']),
               'email' => trim($_POST['email']),
               'phone' => trim($_POST['phone']),
               'role' => trim($_POST['role']),
               'gender' => trim($_POST['gender']),
               'major' => trim($_POST['major']),
               'address' => trim($_POST['address']),
               'city' => trim($_POST['city']),
               'state' => trim($_POST['state']),
               'zip' => trim($_POST['zip']),
             ],
             'errors' => [
               'first_name' => '',
               'last_name' => '',
               'email' => '',
               'phone' => '',
               'role' => '',
               'gender' => '',
               'major' => '',
               'address' => '',
               'city' => '',
               'state' => '',
               'zip' => ''
             ]
           ];

          // Validate Email
          if (empty($data['user']['email'])) {
              $data['errors']['email'] == 'Please enter Email';
          }

          // Validate First & Last Name
          if (empty($data['user']['first_name'])) {
              $data['errors']['first_name'] == 'Please enter First Name';
          }

          if (empty($data['user']['last_name'])) {
              $data['errors']['last_name'] == 'Please enter Last Name';
          }

          // Make sure all errors are empty before processing
          if (!$this->isErrors($data['errors'])) {

             // Edit User
              if ($this->userModel->editUser($data['user'])) {

               // Start Flash message
                  $flash_message = 'User ' . $id .' has been successfully Updated.';

                  //Display a flash message. Flash message is stored in a session.
                  flash('register_success', $flash_message);
                  redirect('users/edit/' . $id);
              }

              // User has not been registered.
              else {
                  flash('register_error', 'Sorry Something went wrong.', 'alert_error');
                  redirect('users/');
              }
          } else {
              redirect('dash');
          }
      }

      public function deleteUser($id)
      {

         // Edit User
          if ($this->userModel->delete($id)) {
              $flash_message = 'User ' . $id .' has been deleted.';

              flash('register_success', $flash_message);
              redirect('users/');
          }
      }

      public function login()
      {
          // Check if logged in
          if (isLoggedIn()) {
              redirect('dash');
          }

              $data = [
          'title' => 'Users',
          'email' => '',
          'password' => '',
          'errors' => [
            'email' => '',
            'password' => '',
            'match' => ''
               ]
          ];

           $this->view('users/login', $data);
      }

      public function auth(){

         // Sanitize POST data

          $data = [
               'title' => 'Login',
               'email' => trim($_POST['email']),
               'password' => trim($_POST['password']),
               'errors' => [
                    'email' => '',
                    'password' => '',
                    'match' => ''
               ]
          ];

          // Validate Email
          if (empty($data['email'])) {
              $data['errors']['email'] = 'Please enter Email';
          } else {
              // Check if User Exist
              if (!$this->userModel->findUserByEmail($data['email'])) {
                  $data['errors']['email'] = "Email isn't registered into our system";
              }
          }

          // Validate Password
          if (empty($data['password'])) {
              $data['errors']['password'] = 'Please enter password';
          }

          // Make sure errors are empty to process form
          if (!$this->isErrors($data['errors'])) {

          // If email and password match. Store user info in a variable for later use.
              $user = $this->userModel->login($data['email'], $data['password']);

              // Check if $user is not empty
              if ($user) {
                  $this->createUserSession($user);
              } else {
                  $data['errors']['match'] = 'Email and Password do not match';
                  $this->view('users/login', $data);
              }
          }
      }

      public function logout()
      {
          $this->logUserOut();
      }

      // Functions

      private function logUserOut()
      {
          unset($_SESSION['user_id']);
          session_destroy();
          redirect('users/login');
      }

      private function createUserSession($user)
      {
          $_SESSION['user_id'] = $user['id'];
          $_SESSION['user_role'] = $user['role'];
          $_SESSION['user_avatar'] = $user['avatar'];
          $_SESSION['user_full_name'] = $user['first_name'] . ' ' . $user['last_name'];
          redirect('dash/');
      }

      private function mailActivator($activation_link, $email)
      {
          $to      = $email;
          $subject = 'XYCC Account Activation';

          // Message
          $message  = 'You have been registered to XYCC';
          $message .= '<br>Please visit the following link to activate your XYCC Account: ' . $activation_link;
          $headers = 'From: activator@xycc.edu' . "\r\n" .
          'Reply-To: activator@xycc.edu' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

          mail($to, $subject, $message, $headers);
      }

      private function mailCredentials($password, $email)
      {
          $to      = $email;
          $subject = 'XYCC Account Info';

          // Message
          $message  = 'You have been registered to XYCC<br>';
          $message .= 'Please visit the following link to log into your XYCC Account: ' . ROOT . 'users/login' . '<br>';
          $message .= 'Username: ' . $email . '<br>';
          $message .= 'Password: ' . $password;

          // To send HTML mail, the Content-type header must be set
          $headers[] = 'MIME-Version: 1.0';
          $headers[] = 'Content-type: text/html; charset=iso-8859-1';

          // Additional headers
          $headers[] = 'To: <' . $email . '>';
          $headers[] = 'From: XYCC <xycc@xycc.edu>';

          if (mail($to, $subject, $message, implode("\r\n", $headers))) {
              return true;
          } else {
              return false;
          }
      }

      private function isErrors($errors)
      {
          foreach ($errors as $key => $value) {
              if (!empty($value)) {
                  return true;
              } else {
                  return false;
              }
          }
      }

      public function randomPassword()
      {
          $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
          $pass = array(); //remember to declare $pass as an array
      $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
      for ($i = 0; $i < 8; $i++) {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
      }
          return implode($pass); //turn the array into a string
      }
  }
