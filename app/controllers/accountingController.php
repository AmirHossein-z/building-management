<?php

class accountingController extends Controller
{
    public $bill_enum = [
        1 => 'اب',
        2 => 'برق',
        3 => 'گاز',
        4 => 'تلفن ثابت',
        5 => 'شارژ ساختمان',
    ];
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($_SESSION['role'] === 'role-manager') {
            // age modir ast
            $building = $this->model('building');
            $building_info = $building->getAllInfoByPersonId($_SESSION['id']);
            if (count($building_info) > 0) {
                // modir sakhteman, sakhteman darad
                $building_unit = $this->model('buildingUnit');
                $building_units_info = $building_unit->getAllListByBuildingId($building_info['id']);
                if (count($building_units_info) > 0) {

                    $info = [];
                    foreach ($building_units_info as $inner_array) {

                        if (is_null($inner_array[2]))
                            continue;
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
                        'bills' => [],
                        'balance' => 0
                    ];
                } else {
                    $data = [
                        'building_units' => [],
                    ];
                }
            } else {
                // modir hast ama sakhteman nadarad
                $data = [
                ];
                $this->alert('error', 'شما باید ابتداد ساختمانی ایجاد کنید');
                $this->redirect('dashboard/add_building');
            }
        } else if ($_SESSION['role'] === 'role-member') {
            $building_unit = $this->model('buildingUnit');
            $building_unit_info = $building_unit->getAllInfoByPersonId($_SESSION['id']);
            if (count($building_unit_info) > 0) {
                // member hast & sakhteman darad 
                $accounting = $this->model('accounting');
                $result = $accounting->getAccountingByPersonId($_SESSION['id']);
                if ($result['status']) {
                    // accounting darim v neshon midim
                    $info = [];
                    foreach ($result['value'] as $item) {
                        $object = array(
                            'id' => $item[0],
                            'type' => $this->bill_enum[$item[1]],
                            'price' => $item[2],
                        );
                        array_push($info, $object);

                        $accounting_id = $item[5];
                        $balance = $item[6];
                    }

                    $data = [
                        'bills' => $info,
                        'building_unit_info' => $building_unit_info,
                        'balance' => $balance,
                        'accounting_id' => $accounting_id
                    ];
                } else {
                    // accounting nadaram v bayad dorost konim
                    $bill = $this->model('bill');
                    $bills_info = $bill->getInfoByBuildingUnitId($building_unit_info['id']);
                    if ($bills_info['status']) {
                        // ghabz darim v bayad mohasebe shavad
                        $accounting = $this->model('accounting');
                        $info = [];
                        $balance = 0;
                        foreach ($bills_info['value'] as $bill_info) {
                            // age ghabz pardakht shode
                            if ($bill_info[3] === 1)
                                continue;

                            $object = array(
                                'id' => $bill_info[0],
                                'type' => $this->bill_enum[$bill_info[1]],
                                'price' => $bill_info[2],
                            );
                            array_push($info, $object);

                            $balance += $bill_info[2];
                        }

                        // accounting table bayad sakhte beshe
                        $result = $accounting->create($balance, $_SESSION['id']);


                        if ($result['status']) {

                            $accounting_id = $result['value'];
                            $operation_failed = false;
                            // accounting id bayad dar bill haye marbote gharar begire
                            $bill = $this->model('bill');
                            foreach ($bills_info['value'] as $bill_info) {
                                // age ghabz pardakht shode
                                if ($bill_info[3] === 1)
                                    continue;

                                $query_status = $bill->updateAccountingId($bill_info[0], $accounting_id);
                                if (!$query_status) {
                                    $operation_failed = true;
                                    break;
                                }
                            }
                            if ($operation_failed) {
                                $data = [
                                    'bills' => [],
                                    'building_unit_info' => [],
                                    'balance' => 0,
                                    'accounting_id' => $accounting_id
                                ];
                            } else {
                                $data = [
                                    'bills' => $info,
                                    'building_unit_info' => $building_unit_info,
                                    'balance' => $balance,
                                    'accounting_id' => $accounting_id
                                ];
                            }
                        } else {
                            $data = [
                                'bills' => $info,
                                'building_unit_info' => $building_unit_info,
                                'balance' => 0,
                                'accounting_id' => ''
                            ];
                        }
                    } else {
                        // gabz nadarim
                        $data = [
                            'bills' => [],
                            'building_unit_info' => $building_unit_info,
                            'balance' => 0,
                            'accounting_id' => ''
                        ];
                    }
                }
            } else {
                $data = [
                    'bills' => [],
                    'building_unit_info' => []
                ];
            }
        }

        $this->header('header', 'حسابرسی');
        $this->view('dashboard/dashboard', $data);
        $this->footer('footer');

    }
    public function building_unit_accounting($building_unit_id)
    {
        $building_unit = $this->model('buildingUnit');
        $building_unit_info = $building_unit->getInfo($building_unit_id);
        if ($building_unit_info['status']) {
            // sakhteman darad 
            $accounting = $this->model('accounting');
            $result = $accounting->getAccountingByPersonId($building_unit_info['value']['person_id']);

            if ($result['status']) {
                // accounting darim v neshon midim

                $info = [];
                foreach ($result['value'] as $item) {
                    $object = array(
                        'id' => $item[0],
                        'type' => $this->bill_enum[$item[1]],
                        'price' => $item[2],
                    );
                    array_push($info, $object);

                    $accounting_id = $item[5];
                    $balance = $item[6];
                }

                $data = [
                    'bills' => $info,
                    'building_unit_info' => $building_unit_info['value'],
                    'balance' => $balance,
                    'accounting_id' => $accounting_id
                ];
            } else {
                // accounting nadaram v bayad dorost konim
                $bill = $this->model('bill');
                $bills_info = $bill->getInfoByBuildingUnitId($building_unit_info['value']['id']);
                if ($bills_info['status']) {
                    // ghabz darim v bayad mohasebe shavad
                    $accounting = $this->model('accounting');
                    $info = [];
                    $balance = 0;
                    foreach ($bills_info['value'] as $bill_info) {
                        // age ghabz pardakht shode
                        if ($bill_info[3] === 1)
                            continue;

                        $object = array(
                            'id' => $bill_info[0],
                            'type' => $this->bill_enum[$bill_info[1]],
                            'price' => $bill_info[2],
                        );
                        array_push($info, $object);

                        $balance += $bill_info[2];
                    }

                    // accounting table bayad sakhte beshe
                    $result = $accounting->create($balance, $building_unit_info['value']['person_id']);


                    if ($result['status']) {

                        $accounting_id = $result['value'];
                        $operation_failed = false;
                        // accounting id bayad dar bill haye marbote gharar begire
                        $bill = $this->model('bill');
                        foreach ($bills_info['value'] as $bill_info) {
                            // age ghabz pardakht shode
                            if ($bill_info[3] === 1)
                                continue;

                            $query_status = $bill->updateAccountingId($bill_info[0], $accounting_id);
                            if (!$query_status) {
                                $operation_failed = true;
                                break;
                            }
                        }
                        if ($operation_failed) {
                            $data = [
                                'bills' => [],
                                'building_unit_info' => [],
                                'balance' => 0,
                                'accounting_id' => ''
                            ];
                        } else {
                            $data = [
                                'bills' => $info,
                                'building_unit_info' => $building_unit_info['value'],
                                'balance' => $balance,
                                'accounting_id' => $accounting_id
                            ];
                        }
                    } else {
                        $data = [
                            'bills' => $info,
                            'building_unit_info' => $building_unit_info['value'],
                            'balance' => 0,
                            'accounting_id' => ''
                        ];
                    }
                } else {
                    // gabz nadarim
                    $data = [
                        'bills' => [],
                        'building_unit_info' => $building_unit_info['value'],
                        'balance' => 0,
                        'accounting_id' => ''
                    ];
                }
            }
        } else {
            // sakhteman nadarim ba in id
            $data = [
                'building_unit_info' => [],
                'bills' => [],
                'balance' => 0
            ];
        }
        $this->header('header', 'حسابرسی واحد ساختمان');
        $this->view('dashboard/dashboard', $data);
        $this->footer('footer');
    }

    public function update_accounting()
    {
        $accounting_id = (int) $_POST['accounting_id'];
        $building_unit_id = (int) $_POST['building_unit_id'];
        if ($accounting_id === 0 || $building_unit_id === 0) {
            $this->alert('شما نمی توانید مقدار حساب خود را بروز رسانی کنید', 'error');
            $this->redirect('dashboard/accounting');
        } else {
            // bill ha bayad accounting_id null beshe
            $bill = $this->model('bill');
            $bills = $bill->getInfoByBuildingUnitId($building_unit_id);
            if ($bills['status']) {
                $operation_failed = false;
                foreach ($bills['value'] as $bill_info) {
                    // age ghabz pardakht shode
                    if ($bill_info[3] === 1)
                        continue;
                    $query_status = $bill->updateAccountingId($bill_info[0], null);
                    if (!$query_status['status']) {
                        $operation_failed = true;
                        break;
                    }

                }

                if ($operation_failed) {

                } else {
                    // accounting ghabli delete beshe
                    $accounting = $this->model('accounting');
                    $result = $accounting->delete($accounting_id);
                    if ($result['status']) {
                        // $this->building_unit_accounting($building_unit_id);
                        $this->redirect('dashboard/accounting/' . $building_unit_id);
                    } else {

                    }
                }
            } else {

            }
        }
    }
}