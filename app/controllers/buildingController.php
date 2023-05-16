<?php

class buildingController extends Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $building = $this->model('building');          
    $result = $building->getAllInfoByPersonId($_SESSION['id']);

    $data = [
      'info' => $result,
      'role' => $_SESSION['role'],
    ];

    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }

  public function add() {
    $building = $this->model('building');          
    $result = $building->getAllInfoByPersonId($_SESSION['id']);

    if(count($result) > 0) {
      $this->redirect('dashboard/building');
    }else {
      $data = [
        'role' => $_SESSION['role'],
      ];
      $this->header('header');
      $this->view('dashboard/dashboard');
      $this->footer('footer');
    }
  }

  public function added() {
    $building_name = filter_var($_POST['building_name'],FILTER_SANITIZE_STRING);
    $building_unit_count = (int) filter_var($_POST['building_unit_count'],FILTER_SANITIZE_NUMBER_INT);
    $building_start_number = (int) filter_var($_POST['building_unit_count'],FILTER_SANITIZE_NUMBER_INT); 

    $building = $this->model('building');
    $result1 = $building->create($building_name,$_SESSION['id']);

    if($result1) {
      $building_id = $result1['value'];
      $building_unit = $this->model('buildingUnit');
      for($i = 0;$i<=$building_unit_count;$i++) {
        $status = $building_unit->create($building_id, (string) ($building_start_number + ($i)) );
        if(!$status) {
          $result2 = false;
          break;
        }
      }

      if($result2) {
        $this->alert('با موفقیت ساختمان شما ثبت شد', 'success');
      }else {
        $this->alert('مشکلی پیش آمده دوباره امتحان کنید', 'error');
      }
      $this->redirect('dashboard/building');
    }else {
      $this->alert('مشکلی پیش آمده دوباره امتحان کنید', 'error');
      $this->redirect('dashboard/building');
    }
  }

  public function edit() {
    $building = $this->model('building');          
    $result = $building->getAllInfoByPersonId($_SESSION['id']);

    $data = [
      'building_id' => $result['id'],
      'info' => $result
    ];

    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }

  public function edited($building_id) {
    $building_name = filter_var($_POST['building_name'], FILTER_SANITIZE_STRING);

    $building = $this->model('building');
    $status = $building->update_info($building_name,$building_id);
    if ($status) {
      $this->alert('اطلاعات شما با موفقت ویرایش شد', 'success');
    }else {
      $this->alert('خطا دوباره امتحان کنید', 'error');
    }
    $this->redirect('dashboard/building');
  }

  public function building_list() {
    $building = $this->model('building');
    $buildings_info = $building->getAllInfo();
    if(count($buildings_info) > 0) {

      $info = [];
      foreach ($buildings_info as $inner_array) {

        $person = $this->model('person');
        $person_info = $person->getAllInfo($inner_array[2]);

        $object = array(
            'id' => $inner_array[0],
            'name' => $inner_array[1],
            'person_name' => $person_info['name'],
            'date_created' => $inner_array[3],
            'date_updated' => $inner_array[4]
        );
        array_push($info,$object);
      }

      $data = [
        'buildings' => $info,
      ];
    }else {
      $data = [
        'buildings' => [],
      ];
    }

    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }
}
