<?php if ($data['role'] === 'role-manager') { ?>
  <?php if (count($data['info']) === 0) { ?>
    <p>شما هنوز ساختمانی را ثبت نکرده ای!</p>
    <a href="<?php echo URL ?>dashboard/add_building" class="btn btn-primary">ثبت ساختمان جدید</a>
  <?php } else { ?>
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
          <div class="info-box card p-4">
            <p>نام ساختمان: <span>
                <?php echo $data['info']['name'] ?>
              </span></p>
            <a href="<?php echo URL ?>dashboard/edit_building_info" class="btn btn-primary">ویرایش اطلاعات</a>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
<?php } else { ?>
  <?php if (count($data['info']) === 0) { ?>
    <p>شما هنوز واحد ساختمانی را برای خود ثبت نکرده ای و اطلاعات ساختمانی برای شما وجود ندارد</p>
    <a href="<?php echo URL ?>dashboard/building_list" class="btn btn-primary">انتخاب واحد ساختمان</a>
  <?php } else { ?>
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">
          <div class="info-box card p-4">
            <p>نام ساختمان: <span>
                <?php echo $data['info']['name'] ?>
              </span></p>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
<?php } ?>