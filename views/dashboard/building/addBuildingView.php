<div class="card">
  <div class="card-body">
    <h5 class="card-title">ثبت ساختمان جدید</h5>
    <form method="POST" action="<?php echo URL ?>dashboard/added_building">
      <div class="row">
        <div class="col-sm-5">
          <label for="building_name" class="col-form-label">نام ساختمان</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="building_name" name="building_name">
          </div>
        </div>
        <div class="col-sm-5">
          <label for="building_unit_count" class="col-form-label">تعداد واحد های ساختمان</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="building_unit_count" id="building_unit_count">
          </div>
        </div>
        <div class="col-sm-8">
          <label for="building_start_number" class="col-form-label">شماره واحد از چند شروع شود؟</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="building_start_number" id="building_start_number">
          </div>
        </div>
      </div>
      <div class="">
        <button type="submit" class="btn btn-primary">ثبت</button>
      </div>
    </form>

  </div>
</div>