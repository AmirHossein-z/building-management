  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center justify-content-between">

    <div class="d-flex align-items-center justify-content-between flex-row-reverse">
      <a href="<?php echo URL; ?>dashboard/index" class="logo d-flex align-items-center">
        <img src="<?php echo URL; ?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block m-2">مدیریت ساختمان</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['name'] ?></span>
            <img src="<?php echo URL ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <h6><?php echo $_SESSION['name']; ?></h6>
            <?php if($_SESSION['role'] === 'role-manager') { ?>
              <span>مدیر ساختمان</span>
            <?php } else {?>
              <span>عضو</span>
            <?php } ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL ?>dashboard/index">
                <i class="bi bi-person"></i>
                <span>پروفایل</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo URL ?>auth/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>خروج</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/index') ? '' : 'collapsed' ?>" href="<?php echo URL ?>dashboard/index">
          <i class="bi bi-person"></i>
          <span>پروفایل</span>
        </a>
      </li>

      <li class="nav-item">
        <?php if($_SESSION['role'] === 'role-manager') { ?>
          <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/building') ? '' : 'collapsed' ?>" href="<?php echo URL ?>dashboard/building">
            <i class="bi bi-menu-button-wide"></i><span>ساختمان</span>
          </a>
        <?php } ?>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php echo ($_GET['url'] === 'dashboard/building_unit') ? '' : 'collapsed' ?>" href="<?php echo URL ?>dashboard/building_unit">
          <i class="bi bi-menu-button-wide"></i><span>واحد شما</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

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
    <?php } elseif($_GET['url'] === 'dashboard/building_units_list/'.explode('/',$_GET['url'])[2]) { ?>
        <?php $this->view('dashboard/buildingUnitsList',$data); ?>
    <?php } ?>
  </main><!-- End #main -->
