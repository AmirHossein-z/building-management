<?php if(count($data['building_unit_info']) === 0) { ?>
  <p>شما دارای واحدی نیستید</p>
  <a href="<?php echo URL ?>dashboard/building_list" class="btn btn-primary">انتخاب واحد ساختمان</a>
<?php } else { ?>
  <p>building unit info here</p>
<?php } ?>
