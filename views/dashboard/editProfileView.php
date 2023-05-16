<section class="section dashboard">
<div class="row">
<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ویرایش اطلاعات</h5>

              <form class="row g-3" method="POST" action="<?php echo URL ?>dashboard/edited_profile">
                <div class="col-12">
                  <label for="username" class="form-label">نام</label>
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo $data['name'] ?>" />
                </div>
                <div class="col-12">
                  <label for="phone" class="form-label">شماره تلفن</label>
                  <input type="number" class="form-control" name="phone" id="phone" value="<?php echo $data['phone'] ?>" />
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">ویرایش</button>
                  <a href="<?php echo URL ?>dashboard/index" class="btn btn-secondary">برگشت</a>
                </div>
              </form>
            </div>
          </div>
        </div>
  </div>
</section>
