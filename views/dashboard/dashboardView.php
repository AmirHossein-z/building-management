<!-- header -->
<?php $this->view('dashboard/headerDashboard', $data); ?>
<!-- header -->

<!-- sidebar -->
<?php $this->view('dashboard/sidebarDashboard'); ?>
<!-- sidebar -->

<!-- main -->
<main id="main" class="main">
  <?php if ($_GET['url'] === 'dashboard/index') {
    $this->view('dashboard/profile/profile', $data);
  } elseif ($_GET['url'] === 'dashboard/edit_profile') {
    $this->view('dashboard/profile/editProfile', $data);
  } elseif ($_GET['url'] === 'dashboard/building') {
    $this->view('dashboard/building/building', $data);
  } elseif ($_GET['url'] === 'dashboard/add_building') {
    $this->view('dashboard/building/addBuilding');
  } elseif ($_GET['url'] === 'dashboard/edit_building_info') {
    $this->view('dashboard/building/editBuildingInfo', $data);
  } elseif ($_GET['url'] === 'dashboard/building_unit') {
    $this->view('dashboard/buildingUnit/buildingUnit', $data);
  } elseif ($_GET['url'] === 'dashboard/building_list') {
    $this->view('dashboard/building/buildingList', $data);
  } elseif ($_GET['url'] === 'dashboard/building_units_list_manage') {
    $this->view('dashboard/buildingUnit/buildingUnitsListManage', $data);
  } elseif ($_GET['url'] === 'dashboard/bills') {
    $this->view('dashboard/bill/bills', $data);
  } elseif ($_GET['url'] === 'dashboard/accounting') {
    $this->view('dashboard/buildingUnit/buildingUnitListsAccounting', $data);
  } elseif (explode('/', ($_GET['url']))[2]) {
    $param = explode('/', $_GET['url'])[2];
    if ($_GET['url'] === 'dashboard/building_units_list/' . $param) {
      $this->view('dashboard/buildingUnit/buildingUnitsList', $data);
    } elseif ($_GET['url'] === 'dashboard/bills_list/' . $param) {
      $this->view('dashboard/bill/billsList', $data);
    } elseif ($_GET['url'] === 'dashboard/create_bill/' . $param) {
      $this->view('dashboard/bill/createBill', $data);
    } elseif ($_GET['url'] === 'dashboard/edit_bill/' . $param) {
      $this->view('dashboard/bill/editBill', $data);
    } else if ($_GET['url'] === 'dashboard/create_bill_for_all/' . $param) {
      $this->view('dashboard/bill/createBillForAll', $data);
    } else if ($_GET['url'] === 'dashboard/accounting/' . $param) {
      $this->view('dashboard/accounting/buildingUnitAccounting', $data);
    }
  } ?>
</main>
<!-- main -->