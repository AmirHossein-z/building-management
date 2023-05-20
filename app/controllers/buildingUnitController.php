<?php

class buildingUnitController extends Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $building_unit = $this->model('buildingUnit');
    $building_unit_info = $building_unit->getAllInfoByPersonId($_SESSION['id']);
    if (count($building_unit_info) > 0) {
      $building = $this->model('building');
      $building_info = $building->getAllInfoByBuildingId($building_unit_info['building_id']);
      $data = [
        'building_unit_info' => $building_unit_info,
        'building_info' => $building_info
      ];
    } else {
      $data = [
        'building_unit_info' => [],
        'building_info' => []
      ];
    }
    $this->header('header');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }


  public function building_units_list($building_id)
  {
    // age modir sakhteman base bayad baresi beshe sakhteman sakhte ya na
    // age sakhte bayad redirect beshe safhe list sakhteman ha
    // darkhast dade vali age nasakhte bayad bere safhe didan sakhteman ta betone
    // sakhteman besaze v hatman alert ham neshon bedim ke shoma sakhteman nasakhti
    // 
    //
    // age karbar addie,bayad check beshe ghablan vahedi ro entekhab karde,
    // age entekhab karde button ha gheir faal beshe vali age entekhab nakarde
    // mitone entekhab kone har vahedi ke mikhad

    $building_unit = $this->model('buildingUnit');
    $building_units_info = $building_unit->getAllListByBuildingId($building_id);
    if (count($building_units_info) > 0) {

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
        array_push($info, $object);
      }

      $data = [
        'building_units' => $info,
      ];
    } else {
      $data = [
        'building_units' => [],
      ];
    }

    $this->header('header');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }

  public function select()
  {
    $building_unit_number = filter_var($_POST['building_unit_number'], FILTER_SANITIZE_STRING);
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $person_id = $_SESSION['id'];

    $building_unit = $this->model('buildingUnit');
    $result = $building_unit->selectOne($id, $person_id);
    if ($result['status']) {
      $this->alert('با موفقیت واحد به نام شما ثبت شد', 'success');
      $this->redirect('dashboard/building_unit');
    } else {
      $this->alert('مشکلی پیش آمده است دوباره امتحان کنید', 'error');
      $this->redirect('dashboard/building_unit');
    }
    return;
  }

  public function edit()
  {
    $building_unit = $this->model('buildingUnit');
    $result = $building_unit->getAllInfoByPersonId($_SESSION['id']);

    $data = [
      'info' => $result
    ];

    $this->header('header');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }

  public function building_units_list_manage()
  {
    $building = $this->model('building');
    $building_info = $building->getAllInfoByPersonId($_SESSION['id']);

    $building_unit = $this->model('buildingUnit');
    $building_units_info = $building_unit->getAllListByBuildingId($building_info['id']);
    if (count($building_units_info) > 0) {

      $info = [];
      foreach ($building_units_info as $inner_array) {

        $person = $this->model('person');
        $person_info = $person->getAllInfo($inner_array[2] ?? 0);

        $object = array(
          'id' => $inner_array[0],
          'building_id' => $inner_array[1],
          'person_name' => $person_info['name'] ?? null,
          'person_id' => $person_info['id'] ?? null,
          'number' => $inner_array[3],
          'date_created' => $inner_array[4],
          'date_updated' => $inner_array[5]
        );
        array_push($info, $object);
      }

      $data = [
        'building_units' => $info,
      ];
    } else {
      $data = [
        'building_units' => [],
      ];
    }

    $this->header('header');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }
}