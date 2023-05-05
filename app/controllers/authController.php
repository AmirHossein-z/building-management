<?php

class authController extends Controller
{
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * save user session
     * @param string $name
     * @param int $id
     * @return void
     */
    // public function save_user_session(string $name, int $id): void
    // {
    //     $_SESSION['name'] = $name;
    //     $_SESSION['id'] = $id;
    //     $_SESSION['type'] = $this->check_user();
    // }

    /**
     * show register page
     * @return void
     */
    public function register(): void
    {
        $this->header('header');
        $this->view('auth/register');
        $this->footer('footer');
    }

    /**
     * register a user in database
     * @return void
     */
    public function registered(): void
    {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

        $person = $this->model('person');
        if($role === "role-manager") {
          $result = $person->isPersonExists('manager',$email,$password);
        }else{
          $result = $person->isPersonExists('member',$email,$password);
          }

        if ($result['status']) {
          echo "user already exists";
        } else {
          if($role === 'role-manager'){
           $query_status = $person->addPerson('manager',$username,$phone,$email,$password) ;
          }else {
           $query_status = $person->addPerson('member',$username,$phone,$email,$password) ;
          }
          if($query_status['status'] === 1){
                $this->redirect('auth/login');
          }else {
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
        if($role === "role-manager") {
          $result = $person->isPersonExists('manager',$email,$password);
        }else{
          $result = $person->isPersonExists('member',$email,$password);
          }

        var_dump($result);
        if ($result['status']) {
            $status = $result['status'];
            $name = $result['value']['name'];
            $id=$result['value']['id'];

            // save in session
            $_SESSION['name'] = $name;
            $_SESSION['id'] = $id;
            // $this->set_alert('شما با موفقیت وارد شدید!', ALERT_SUCCESS);
            $this->redirect('dashboard/index');
        } else {
            // $this->set_alert('مشکلی در ورود پیش آمده است دوباره امتحان کنید', ALERT_ERROR);
            $this->redirect('auth/login');
        }
    }

    // public function logout()
    // {
    //     session_destroy();
    //     session_start();
    //     $this->redirect('auth/login');
    //     exit();
    // }
}
