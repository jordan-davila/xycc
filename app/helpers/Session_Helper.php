<?php
  session_start();

  // Flash message helper
  // EXAMPLE - flash('register_success', 'You are now registered');
  // DISPLAY IN VIEW - echo flash('register_success');
  function flash($name = '', $message = '', $class = 'alert_success'){
    if(!empty($name)){
      if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
          unset($_SESSION[$name]);
        }

        if(!empty($_SESSION[$name. '_class'])){
          unset($_SESSION[$name. '_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name. '_class'] = $class;

      } elseif(empty($message) && !empty($_SESSION[$name])){
        $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
        echo '<div class="'.$class.'" id="flash_msg">'.$_SESSION[$name].'</div>';
        unset($_SESSION[$name]);
        unset($_SESSION[$name. '_class']);
      }
    }
  }

  function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
      return true;
    } else {
      return false;
    }
  }

  function block($role, $url){
    if($_SESSION['user_role'] == $role){
      redirect($url);
    }
  }

  function isAdmin(){
    if(isset($_SESSION['user_role'])){
      if ($_SESSION['user_role'] == 'admin') {
        return true;
      } else {
        return false;
      }
    }
  }

  function isTeacher(){
    if(isset($_SESSION['user_role'])){
      if ($_SESSION['user_role'] == 'teacher') {
        return true;
      } else {
        return false;
      }
    }
  }

  function isStudent(){
    if(isset($_SESSION['user_role'])){
      if ($_SESSION['user_role'] == 'student') {
        return true;
      } else {
        return false;
      }
    }
  }

?>
