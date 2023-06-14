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
    $this->header('header', 'واحد شما');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }


  public function building_units_list($building_id)
  {
    if ($_SESSION['role'] === 'role-manager') {
      $building = $this->model('building');
      $result = $building->getAllInfoByPersonId($_SESSION['id']);
      if (count($result) > 0) {
        // modir sakhteman, sakhteman darad
        if ($result['id'] === (int) $building_id) {
          // sakhteman khodash hast
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
        } else {
          // modir sakhteman daram vali be list sakhteman digar
          // ra mikhahad moshahede konad be safhe list sakhteman ha
          // redirect mikonim
          $this->alert('شما فقط مجاز به انتخاب واحد در ساختمان خود هستید', 'error');
          $this->redirect('dashboard/building_list');
        }
      } else {
        // ya sakhteman modir nist ya hanoz sakhteman nasakhte
        // age sakhteman modir nist pas hagh nadare bebine 
        // chon faghat mitone dakhel sakhteman khodesh
        // vahed entekhab kone
        $this->redirect('dashboard/building_list');
      }
    } else if ($_SESSION['role'] === 'role-member') {
      $person = $this->model('person');
      $status = $person->isPersonHasBuildingUnit($_SESSION['id']);
      if ($status) {
        // member hast & sakhteman darad pas bayad etelaat sakhteman khod ra bebinad
        $this->alert('شما در حال حاضر صاحب یک واحد ساختمان هستید', 'error');
        $this->redirect('dashboard/building_list');
      } else {
        // member hast vali sakhteman nadarad pas neshan bede etelaat ra
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
      }
    }


    $this->header('header', 'اطلاعات واحد شما');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }

  public function select()
  {
    // age ghablan vahed entekhab karde nabayad 
    // alan betone dobare entekhab kone
    $building_unit = $this->model('buildingUnit');
    $result = $building_unit->getAllInfoByPersonId($_SESSION['id']);
    if (count($result) > 0) {
      $this->alert('شما دارای یک واحد از ساختمان هستید و نمی توانید دوباره انتخاب کنید', 'error');
      $this->redirect('dashboard/building_list');
    } else {

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
    }
  }

  public function edit()
  {
    $building_unit = $this->model('buildingUnit');
    $result = $building_unit->getAllInfoByPersonId($_SESSION['id']);

    $data = [
      'info' => $result
    ];

    $this->header('header', 'ویرایش اطلاعات واحد ساختمان');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }

  public function building_units_list_manage()
  {
    $building = $this->model('building');
    $building_info = $building->getAllInfoByPersonId($_SESSION['id']);

    if (count($building_info) > 0) {

      $building_unit = $this->model('buildingUnit');
      $building_units_info = $building_unit->getAllListByBuildingId($building_info['id']);
      if (count($building_units_info) > 0) {

        $info = [];
        foreach ($building_units_info as $inner_array) {

          // age modir bod,nemikhad ghabz vasash tayin beshe
          if ($inner_array[2] === $_SESSION['id']) {
            continue;
          }
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
    } else {
      $data = [
        'building_units' => [],
      ];
    }

    $this->header('header', 'لیست واحد های ساختمان');
    $this->view('dashboard/dashboard', $data);
    $this->footer('footer');
  }
}