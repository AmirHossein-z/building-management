<section class="section dashboard">
  <div class="row">
      <div class="col-lg-8">
        <div class="info-box card p-4">
          <p>نام و نام خانوادگی: <span><?php echo $data['name'] ?></span></p>
          <p>ایمیل: <span><?php echo $data['email'] ?></span></p>
          <p>شماره تلفن :<span><?php echo $data['phone'] ?></span></p>
          <div class="float-left">
            <a href="<?php echo URL ?>dashboard/edit_profile" class="btn btn-primary">ویرایش اطلاعات</a>
          </div>
        </div>
      </div>
  </div>
</section>
