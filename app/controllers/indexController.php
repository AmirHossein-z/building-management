<?php

class indexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function main()
    {
        // $this->header('header');
        $this->view('main');
        // $this->header('footer');
    }

    public function not_found()
    {
        $this->header('header');
        $this->view('notFound');
        $this->footer('footer');
    }
}
