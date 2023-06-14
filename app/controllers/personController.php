<?php

class personController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function edit_profile()
  {
    $person = $this->model('person');
    $data = $person->getAllInfo($_SESSION['id']);

    $this->header('header', 'ویرایش پروفایل');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }

  public function edited_profile()
  {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);

    $person = $this->model('person');
    $status = $person->updatePersonById($_SESSION['id'], $username, $phone);
    if ($status) {
      $_SESSION['name'] = $username;
      $this->alert('اطلاعات شما با موفقت ویرایش شد', 'success');
    } else {
      $this->alert('خطا دوباره امتحان کنید', 'error');
    }
    $this->redirect('dashboard/index');
  }
}