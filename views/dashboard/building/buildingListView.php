<?php if (count($data['buildings']) > 0) { ?>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">ساختمان ها</h5>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">نام ساختمان</th>
            <th scope="col">نام مدیر ساختمان</th>
            <th scope="col">اعمال</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['buildings'] as $index => $building) { ?>
            <tr>
              <th scope="row">
                <?php echo (int) ($index) + 1; ?>
              </th>
              <td>
                <?php echo $building['name'] ?>
              </td>
              <td>
                <?php echo $building['person_name'] ?>
              </td>
              <td><a class="btn btn-success"
                  href="<?php echo URL; ?>dashboard/building_units_list/<?php echo $building['id']; ?>">لیست واحد ها</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
<?php } else { ?>
  <p>در حال حاضر ساختمانی وجود ندارد</p>
<?php } ?>