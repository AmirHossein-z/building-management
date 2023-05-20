<a href="<?php echo URL ?>dashboard/create_bill_for_all" class="btn btn-primary">ایجاد قبض برای همه واحد های فعال</a>

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
              <?php if ($building_unit['person_id']) { ?>
                <td>
                  <a class="btn btn-success"
                    href="<?php echo URL ?>dashboard/create_bill/<?php echo $building_unit['id']; ?>">تعیین قبض برای این
                    واحد</a>
                  <a class="btn btn-warning"
                    href="<?php echo URL ?>dashboard/bills_list/<?php echo ($building_unit['person_id'] ?? ""); ?>">لیست قبض
                    ها</a>
                </td>
              <?php } else { ?>
                <td><button class="btn btn-secondary" type="button">غیر فعال</a></td>
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