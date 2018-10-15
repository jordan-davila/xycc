<?php

  // Load Config
  require_once 'config/config.php';

  // Load Helpers
  // require_once 'helpers/Mail.php';
  require_once 'helpers/Pagination.php';
  require_once 'helpers/Url_Helper.php';
  require_once 'helpers/Session_Helper.php';
  require_once 'helpers/Bcrypt.php';

  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });

  // Init Route Library
  $route = new Route;

  // Required Router
  require_once 'libraries/Router.php';
