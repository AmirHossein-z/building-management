<?php if (count($data['bills']) > 0) { ?>
  <?php foreach ($data['bills'] as $bill) { ?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">قبض
          <?php echo $bill['bill_type']; ?>
        </h5>
        <p>حساب این واحد: <span>
            <?php echo $bill['bill_price']; ?>
          </span>تومان</p>
        <p>وضعیت قبض : <span>
            <?php echo $bill['bill_status']; ?>
          </span></p>
        <p>شماره واحد ساختمان:<span>
            <?php echo $bill['number']; ?>
          </span></p>
        <p>نام شخص:<span>
            <?php echo $bill['person_name']; ?>
          </span></p>
        <p>شماره تماس:<span>
            <?php echo $bill['person_phone']; ?>
          </span></p>
      </div>
      <div class="m-2 d-flex gap-3 justify-content-end align-items-center">
        <a href="<?php echo URL ?>dashboard/edit_bill/<?php echo $bill['bill_id']; ?>" class="btn btn-primary">ویرایش</a>
        <a href="<?php echo URL ?>dashboard/delete_bill/<?php echo $bill['bill_id']; ?>" class="btn btn-danger">حذف</a>
      </div>
    </div>
  <?php } ?>
<?php } else { ?>
  <p>در حال حاضر قبضی ثبت نشده است</p>
<?php } ?>