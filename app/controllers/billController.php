<?php

class billController extends Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    // $building = $this->model('building');          
    // $result = $building->getAllInfoByPersonId($_SESSION['id']);
    //
    // $data = [
    //   'info' => $result,
    //   'role' => $_SESSION['role'],
    // ];
    $data = [];


    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }

  public function create_one() {

  }

  public function bills_list($person_id) {
    $data = [];

    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }
}
