<?php

class billController extends Controller {
  private $bill_enum = [
    1 => 'اب',
    2 => 'برث',
    3 => 'گاز',
    4 => 'تلفن ثابت',
  ];

  private $bill_status = [
    0 => 'پرداخت نشده',
    1 => 'پرداخت شده'
  ];

  public function __construct() {
    parent::__construct();
  }

  public function create($building_unit_id) {
    
    $building_unit = $this->model('buildingUnit');
    $result = $building_unit->getInfo($building_unit_id);
    if($result['status']) {

      $data = [
        'number' => $result['value']['number'],
        'id' => $result['value']['id']
      ];
    }else {
      $data = [
        'number' => '',
        'id' =>''
      ];
    }
    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }

  public function created() {
    $building_unit_id = (int) filter_var($_POST['building_unit_id'],FILTER_SANITIZE_NUMBER_INT);

    $bill = $this->model("bill");
    $i = 1;
    while (isset($_POST['bill_type_'.$i]) && isset($_POST['bill_price_'.$i])) {
      $bill_type = filter_var($_POST['bill_type_'.$i],FILTER_SANITIZE_NUMBER_INT);
      $bill_price = (float) filter_var($_POST['bill_price_'.$i],FILTER_SANITIZE_NUMBER_FLOAT);

      $result = $bill->create($bill_type,$bill_price,$building_unit_id);
      if(!$result['status']) {
        $this->redirect('','error');
        break;
      }

      $i++;
    }
    $this->redirect('dashboard/building_units_list_manage','success');
  }

  public function bills_list($person_id) {
    $person = $this->model('person');
    $person_info = $person->getAllInfo($person_id);
    $bill = $this->model('bill');          
    $result = $bill->billsForMember($person_id);

    if($result['status']) {
      $bills_info = [];
      foreach ($result['value'] as $bill) {

        $object = array(
            'bill_id' => $bill[0],
            'bill_type' => $this->bill_enum[$bill[1]],
            'bill_price' => $bill[2],
            'bill_status' => $this->bill_status[$bill[3]],
            'building_unit_id' => $bill[4],
            'accounting_id' => $bill[5],
            'building_id' => $bill[6],
            'person_id' => $bill[7],
            'person_name' => $person_info['name'],
            'person_phone' => $person_info['phone'],
            'number' => $bill[8],
        );

        array_push($bills_info,$object);
      }

      $data = [
        'bills'=> $bills_info,
      ];

    }else {
      $data = [
        'bills' => []
      ];
    }

    $this->header('header');
    $this->view('dashboard/dashboard',$data);
    $this->footer('footer');
  }

  public function bills_for_member() {
    $this->bills_list($_SESSION['id']);
    // $this->header('header');
    // $this->view('dashboard/dashboard',$data);
    // $this->footer('footer');
  }
}
