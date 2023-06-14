<?php

class indexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function main()
    {
        $this->header('header', 'صفحه اصلی');
        $this->view('main');
        $this->footer('footer');
    }

    public function not_found()
    {
        $this->header('header', 'صفحه پیدا نشد');
        $this->view('notFound');
        $this->footer('footer');
    }
}