<?php

class dashboardController extends Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index():void {
        $this->header('header');
        $this->view('dashboard/dashboard');
        $this->footer('footer');
  }
}
