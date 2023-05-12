<?php if(isset($_SESSION['alert'])) { ?>
  <?php if ($_SESSION['alert']['type'] === 'success') { ?>
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show position-absolute" role="alert" style="z-index:999;top:60px;right:0px;">
      <span><?php echo $_SESSION['alert']['message']; ?></span>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php } else if($_SESSION['alert']['type'] === 'error') { ?>
  <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show position-absolute" role="alert" style="z-index:999;top:60px;right:0px;">
    <span><?php echo $_SESSION['alert']['message']; ?></span>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php } ?>
<?php } $_SESSION['alert'] = null?>
