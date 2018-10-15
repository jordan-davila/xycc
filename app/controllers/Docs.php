<?php
  class Docs extends Controller {
    public function __construct(){

    }

    public function getProposal(){
      $data = [
        'title' => 'Docs'
      ];
      $this->view('docs/proposal', $data);
    }

    public function getCaseStudy(){
      $data = [
        'title' => 'Docs: Database'
      ];
      $this->view('docs/casestudy', $data);
    }

  }
