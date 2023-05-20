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
          <span class="d-none d-md-block dropdown-toggle ps-2">
            <?php echo $_SESSION['name'] ?>
          </span>
          <img src="<?php echo URL ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>
              <?php echo $_SESSION['name']; ?>
            </h6>
            <?php if ($_SESSION['role'] === 'role-manager') { ?>
              <span>مدیر ساختمان</span>
            <?php } else { ?>
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
</header>