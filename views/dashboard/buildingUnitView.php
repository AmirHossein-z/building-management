<?php if (count($data['building_unit_info']) === 0) { ?>
  <p>شما دارای واحدی نیستید</p>
  <a href="<?php echo URL ?>dashboard/building_list" class="btn btn-primary">انتخاب واحد ساختمان</a>
<?php } else { ?>
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-8">
        <div class="info-box card p-4">
          <p>شماره واحد:<span>
              <?php echo $data['building_unit_info']['number'] ?>
            </span></p>
          <p>نام صاحب واحد:<span>
              <?php echo $_SESSION['name']; ?>
            </span></p>
          <p>نام ساختمان: <span>
              <?php echo $data['building_info']['name']; ?>
            </span></p>
        </div>
      </div>
    </div>
  </section>
<?php } ?>