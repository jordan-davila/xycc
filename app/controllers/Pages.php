<?php
  class Pages extends Controller
  {
      public function __construct()
      {
      }

      public function index()
      {
          $data = [
        'title' => 'Home'
      ];

          $this->view('pages/index', $data);
      }

      public function getAbout()
      {
          $data = [
        'title' => 'About'
      ];

          $this->view('pages/about', $data);
      }

      public function getAdmissions()
      {
          $data = [
        'title' => 'About'
      ];

          $this->view('pages/admissions', $data);
      }

      public function getAcademics()
      {
          $data = [
        'title' => 'About'
      ];

          $this->view('pages/academics', $data);
      }

      public function getCampus()
      {
          $data = [
        'title' => 'About'
      ];

          $this->view('pages/campus', $data);
      }

      public function getStore()
      {
          $data = [
        'title' => 'About'
      ];

          $this->view('pages/store', $data);
      }

      public function get404()
      {
          $data = [
        'title' => 'Page Not Found'
      ];

          $this->view('pages/404', $data);
      }
  }
