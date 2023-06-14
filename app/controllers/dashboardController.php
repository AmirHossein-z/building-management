<?php

class dashboardController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index(): void
  {
    $person = $this->model('person');
    $data = $person->getAllInfo($_SESSION['id']);

    $this->header('header', 'داشبورد');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }
}