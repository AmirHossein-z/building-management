<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/index') ? '' : 'collapsed' ?>"
        href="<?php echo URL ?>dashboard/index">
        <i class="bi bi-person mx-2" style="font-size:21px"></i>
        <span>پروفایل</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/building') ? '' : 'collapsed' ?>"
        href="<?php echo URL ?>dashboard/building">
        <i class="bx bxs-building-house mx-2" style="font-size:21px"></i><span>ساختمان</span>
      </a>
    </li>

    <?php if ($_SESSION['role'] === 'role-manager') { ?>
      <li class="nav-item">
        <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/building_units_list_manage') ? '' : 'collapsed' ?>"
          href="<?php echo URL ?>dashboard/building_units_list_manage">
          <i class="bi bi-list-ul mx-2" style="font-size:21px;"></i><span>لیست واحد های ساختمان شما</span>
        </a>
      </li>
    <?php } ?>


    <li class="nav-item">
      <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/building_unit') ? '' : 'collapsed' ?>"
        href="<?php echo URL ?>dashboard/building_unit">
        <i class="bi bi-building mx-2" style="font-size:21px;"></i><span>واحد شما</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/building_list') ? '' : 'collapsed' ?>"
        href="<?php echo URL ?>dashboard/building_list">
        <i class="bi bi-building mx-2" style="font-size:21px;"></i><span>لیست ساختمان ها</span>
      </a>
    </li>

    <?php if ($_SESSION['role'] === 'role-member') { ?>
      <li class="nav-item">
        <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/bills') ? '' : 'collapsed' ?>"
          href="<?php echo URL ?>dashboard/bills">
          <i class="bi bi-newspaper mx-2"></i><span>لیست قبض های من</span>
        </a>
      </li>
    <?php } ?>

  </ul>

</aside>