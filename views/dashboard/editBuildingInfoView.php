<section class="section dashboard">
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">ویرایش اطلاعات</h5>
        <form class="row g-3" method="POST" action="<?php echo URL ?>dashboard/edited_building_info/<?php echo $data['info']['id']; ?>">
          <div class="col-12">
            <label for="username" class="form-label">نام ساختمان</label>
            <input type="text" class="form-control" name="building_name" id="building_name" value="<?php echo $data['info']['name'] ?>" />
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">ویرایش</button>
            <a href="<?php echo URL ?>dashboard/building" class="btn btn-secondary">برگشت</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
