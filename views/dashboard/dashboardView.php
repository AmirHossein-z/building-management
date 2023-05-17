<!-- header -->
<?php $this->view('dashboard/headerDashboard',$data); ?>
<!-- header -->

<!-- sidebar -->
<?php $this->view('dashboard/sidebar'); ?>
<!-- sidebar -->

<!-- main -->
<main id="main" class="main">
  <?php if($_GET['url'] === 'dashboard/index') { ?>
      <?php $this->view('dashboard/profile',$data); ?>
  <?php } elseif($_GET['url'] === 'dashboard/edit_profile') { ?>
      <?php $this->view('dashboard/editProfile',$data); ?>
  <?php } elseif($_GET['url'] === 'dashboard/building') { ?>
      <?php $this->view('dashboard/building',$data); ?>
  <?php }  elseif($_GET['url'] === 'dashboard/add_building') { ?>
      <?php $this->view('dashboard/addBuilding'); ?>
  <?php } elseif($_GET['url'] === 'dashboard/edit_building_info') { ?>
      <?php $this->view('dashboard/editBuildingInfo',$data); ?>
  <?php } elseif($_GET['url'] === 'dashboard/building_unit') { ?>
      <?php $this->view('dashboard/buildingUnit',$data); ?>
  <?php } elseif($_GET['url'] === 'dashboard/building_list') { ?>
      <?php $this->view('dashboard/buildingList',$data); ?>
  <?php } elseif($_GET['url'] === 'dashboard/building_units_list_manage') { ?>
      <?php $this->view('dashboard/buildingUnitsListManage',$data); ?>
  <?php } elseif($_GET['url'] === 'dashboard/building_list') { ?>
      <?php $this->view('dashboard/buildingList',$data); ?>
  <?php } elseif($_GET['url'] === 'dashboard/bills') { ?>
      <?php $this->view('dashboard/bills',$data); ?>
  <?php } elseif(explode('/',$_GET['url'])[2]) { ?>
    <?php if($_GET['url'] === 'dashboard/building_units_list/'.explode('/',($_GET['url']))[2]) { ?>
      <?php $this->view('dashboard/buildingUnitsList',$data); ?>
    <?php } ?>
  <?php } ?>
</main>
<!-- main -->
