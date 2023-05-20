<?php if (count($data['building_units']) > 0) { ?>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">واحد های ساختمان </h5>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">شماره واحد</th>
            <th scope="col">نام صاحب واحد ساختمان</th>
            <th scope="col">اعمال</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['building_units'] as $index => $building_unit) { ?>
            <tr>
              <th scope="row">
                <?php echo (int) ($index) + 1; ?>
              </th>
              <td>
                <?php echo $building_unit['number'] ?>
              </td>
              <td>
                <?php echo $building_unit['person_name'] ?? "این اتاق در حال حاضر صاحبی ندارد" ?>
              </td>
              <?php if ($building_unit['person_name'] === null) { ?>
                <td>
                  <form method="POST" action="<?php echo URL ?>dashboard/select_building_unit">
                    <input name="building_unit_number" id="building_unit_number" type='hidden'
                      value="<?php echo $building_unit['number']; ?>" />
                    <input name="id" id="id" type='hidden' value="<?php echo $building_unit['id']; ?>" />
                    <button type="submit" class="btn btn-success">انتخاب</button>
                  </form>
                </td>
              <?php } else { ?>
                <td><a class="btn btn-secondary" href="#">غیر فعال</a></td>
              <?php } ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
<?php } else { ?>
  <p>در حال حاضر برای این ساختمان واحدی وجود ندارد</p>
  <a class="btn btn-secondary" href="<?php echo URL; ?>dashboard/building_unit">برگشت به صفحه واحد</a>
<?php } ?>