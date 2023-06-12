<!-- header -->
<?php $this->view('dashboard/headerDashboard', $data); ?>
<!-- header -->

<!-- sidebar -->
<?php $this->view('dashboard/sidebar'); ?>
<!-- sidebar -->

<!-- main -->
<main id="main" class="main">
  <?php if ($_GET['url'] === 'dashboard/index') {
    $this->view('dashboard/profile', $data);
  } elseif ($_GET['url'] === 'dashboard/edit_profile') {
    $this->view('dashboard/editProfile', $data);
  } elseif ($_GET['url'] === 'dashboard/building') {
    $this->view('dashboard/building', $data);
  } elseif ($_GET['url'] === 'dashboard/add_building') {
    $this->view('dashboard/addBuilding');
  } elseif ($_GET['url'] === 'dashboard/edit_building_info') {
    $this->view('dashboard/editBuildingInfo', $data);
  } elseif ($_GET['url'] === 'dashboard/building_unit') {
    $this->view('dashboard/buildingUnit', $data);
  } elseif ($_GET['url'] === 'dashboard/building_list') {
    $this->view('dashboard/buildingList', $data);
  } elseif ($_GET['url'] === 'dashboard/building_units_list_manage') {
    $this->view('dashboard/buildingUnitsListManage', $data);
  } elseif ($_GET['url'] === 'dashboard/building_list') {
    $this->view('dashboard/buildingList', $data);
  } elseif ($_GET['url'] === 'dashboard/bills') {
    $this->view('dashboard/bills', $data);
  } elseif ($_GET['url'] === 'dashboard/accounting') {
    $this->view('dashboard/buildingUnitListsAccounting', $data);
  } elseif (explode('/', ($_GET['url']))[2]) {
    $param = explode('/', $_GET['url'])[2];
    if ($_GET['url'] === 'dashboard/building_units_list/' . $param) {
      $this->view('dashboard/buildingUnitsList', $data);
    } elseif ($_GET['url'] === 'dashboard/bills_list/' . $param) {
      $this->view('dashboard/billsList', $data);
    } elseif ($_GET['url'] === 'dashboard/create_bill/' . $param) {
      $this->view('dashboard/createBill', $data);
    } elseif ($_GET['url'] === 'dashboard/edit_bill/' . $param) {
      $this->view('dashboard/editBill', $data);
    } else if ($_GET['url'] === 'dashboard/create_bill_for_all/' . $param) {
      $this->view('dashboard/createBillForAll', $data);
    } else if ($_GET['url'] === 'dashboard/accounting/' . $param) {
      $this->view('dashboard/buildingUnitAccounting', $data);
    }
  } ?>
</main>
<!-- main -->