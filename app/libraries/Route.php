<?php
  /*
   * App Route Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Route
  {
      protected $controller;

      protected $method;

      protected $params;

      protected $url;

      protected $pageMethod = 'GET';

      protected $isMatched = false;

      public function __construct()
      {
          $this->url = $this->explode_url($this->get_uri());
      }

      public function get_uri()
      {
          if (isset($_GET['url'])) {
              $url = rtrim($_GET['url'], '/');
              $url = filter_var($url, FILTER_SANITIZE_URL);
              $url = '/' . $url;

              return $url;
          }
      }

      public function explode_url($url)
      {
          $url = explode('/', $url);
          unset($url[0]); // We unset this because theres a leading '/' in the url. When we explode it we get an [0] of null.
          $url = array_values($url);
          return $url;
      }

      public function add($pageMethod, $url, $middleware, $auth = false, $roles = null)
      {
          if ($this->match($url)) {
              $this->pageMethod = $pageMethod;

              if ($auth) {
                  // Verify if user is isLoggedIn
                  if (isLoggedIn()) {
                      // If Roles have been assigned than find if role matched $_SESSION
                      if (!empty($roles)) {
                          // Find a match
                          foreach ($roles as $role) {
                              if ($role == $_SESSION['user_role']) {
                                  $this->run($middleware);
                                  return;
                              }
                          }
                          // If not authorized
                          redirect('dash');
                      }
                  } else {
                      // If Unknown user tries forcing itself in than redirect them to login.
                      redirect('users/login');
                  }
              } else {
                  $this->run($middleware);
              }
          }
      }

      public function run($middleware)
      {
          $middleware = explode('@', $middleware);
          // Look in controllers for first value
          if (file_exists(APP . 'controllers/' . ucfirst($middleware[0]). '.php')) {
              // If exists, set as controller
              $this->controller = ucfirst($middleware[0]);
              // Unset 0 Index
              unset($middleware[0]);
          }

          // Require the controller
          require_once APP . 'controllers/'. $this->controller . '.php';

          // Instantiate controller class
          $this->controller = new $this->controller;

          // Check for second part of url
          if (isset($middleware[1])) {
              // Check to see if method exists in controller
              if (method_exists($this->controller, $middleware[1])) {
                  $this->method = $middleware[1];
                  // Unset 1 index
                  unset($middleware[1]);
              }

              // Get params
              $this->params = $this->url ? array_slice($this->url, 2) : [];

              //Check for Request Method [GET, POST]
              if ($_SERVER['REQUEST_METHOD'] == $this->pageMethod) {

                    // Sanitize POST data
                  if ($this->pageMethod == 'POST') {
                      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                  }

                  // Call a callback with array of params
                  call_user_func_array([$this->controller, $this->method], $this->params);
              } else {
                  // redirect('dash');
              }
          }
      }

      public function match($url)
      {
          $url = $this->explode_url($url);

          // If there's already a match, then don't proceed.
          if ($this->isMatched) {
              return false;
          }

          // If home page '/'
          if (empty($this->url)) {
              $this->isMatched = true;
              return true;
          }

          // Match Controller
          if ($url[0] == $this->url[0]) {

              // Match Method
              if (isset($this->url[1])) {
                  if (isset($url[1])) {
                      if ($url[1] == $this->url[1]) {
                          $this->isMatched = true;
                          return true;
                      }
                  }
              } else {
                  $this->isMatched = true;
                  return true;
              }
          }
          // redirect('pages/404');s
          return false;
      }

      public function set404($middleware)
      {
          if (!$this->isMatched) {
              $this->run($middleware);
          }
      }
  }
