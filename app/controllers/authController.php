<?php

class authController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register()
    {
        $this->header('header');
        $this->view('auth/register');
        $this->footer('footer');
    }

    public function registered()
    {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

        $person = $this->model('person');
        $result = $person->isPersonExists($email, $password);

        if ($result['status']) {
            $this->alert('کاربری با این مشخصات وجود دارد', 'error');
            $this->redirect('auth/register');
        } else {
            // if($role === 'role-manager'){
            $query_status = $person->addPerson($username, $phone, $email, $password, $role === 'role-manager' ? 1 : 0);
            // }else {
            //  $query_status = $person->addPerson($username,$phone,$email,$password,0) ;
            // }
            if ($query_status['status']) {
                $this->alert('با موفقیت ثبت نام کردید', 'success');
                $this->redirect('auth/login');
            } else {
                $this->alert('خطا دوباره امتحان کردید', 'error');
                $this->redirect('auth/register');
            }
        }
    }

    /**
     * show login page
     * @return void
     */
    public function login(): void
    {
        $this->header('header');
        $this->view('auth/login');
        $this->footer('footer');
    }

    /**
     * login a user  
     * @return void
     */
    public function loggedIn(): void
    {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

        $person = $this->model('person');
        $result = $person->isPersonExists($email, $password, $role === 'role-manager' ? 1 : 0);

        if ($result['status']) {
            $status = $result['status'];
            $name = $result['value']['name'];
            $id = $result['value']['id'];

            // save in session
            $_SESSION['name'] = $name;
            $_SESSION['id'] = $id;
            $_SESSION['role'] = $role;
            $this->alert('شما با موفقیت وارد شدید!', 'success');
            $this->redirect('dashboard/index');
        } else {
            $this->alert('مشکلی در ورود پیش آمده است دوباره امتحان کنید', 'error');
            $this->redirect('auth/login');
        }
    }

    public function logout()
    {
        session_destroy();
        session_start();
        $this->redirect('auth/login');
        exit();
    }
}