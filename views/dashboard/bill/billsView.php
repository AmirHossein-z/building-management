<?php if (count($data['bills']) > 0) { ?>
  <?php foreach ($data['bills'] as $bill) { ?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">قبض
          <?php echo $bill['bill_type']; ?>
        </h5>
        <p>حساب واحد شما:<span>
            <?php echo $bill['bill_price']; ?>
          </span>تومان</p>
        <p>وضعیت قبض شما: <span>
            <?php echo $bill['bill_status']; ?>
          </span></p>
        <p>شماره واحد ساختمان:<span>
            <?php echo $bill['number']; ?>
          </span></p>
      </div>
    </div>
  <?php } ?>
<?php } else { ?>
  <p>در حال حاضر قبضی ثبت نشده است</p>
<?php } ?>