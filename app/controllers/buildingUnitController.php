<?php

class buildingUnitController extends Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $building_unit = $this->model('buildingUnit');          
    $building_unit_info = $building_unit->getAllInfoByPersonId($_SESSION['id']);
    if(count($building_unit_info) > 0) {
      // etelaat building_info
      $data = [
        'building_unit_info' => []
      ];
    }else {
      $data = [
        'building_unit_info' => []
      ];
    }
    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }


  public function building_units_list($building_id) {
    $building_unit = $this->model('buildingUnit');
    $building_units_info = $building_unit->getAllListByBuildingId($building_id);
    if(count($building_units_info) > 0) {

      $info = [];
      foreach ($building_units_info as $inner_array) {

        $person = $this->model('person');
        $person_info = $person->getAllInfo($inner_array[2] ?? 0);

        $object = array(
            'id' => $inner_array[0],
            'building_id' => $inner_array[1],
            'person_name' => $person_info['name'] ?? null,
            'number' => $inner_array[3],
            'date_created' => $inner_array[4],
            'date_updated' => $inner_array[5]
        );
        array_push($info,$object);
      }

      $data = [
        'building_units' => $info,
      ];
    }else {
      $data = [
        'building_units' => [],
      ];
    }

    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }

  public function select() {
    $building_unit_number = filter_var($_POST['building_unit_number'], FILTER_SANITIZE_STRING);
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $person_id = $_SESSION['id'];

    var_dump($id);
    var_dump($building_unit_number);
    return;
  }
}
