<div class="card">
  <div class="card-body">
    <h5 class="card-title">
    ایجاد قبض برای واحد با شماره<span><?php echo $data['number']; ?></span>
</h5>

    <form method="POST" action="<?php echo URL ?>dashboard/created_bill">
      <div id="bill_container">
        <div id='bill1'>
          <div class="row mb-3">
            <select id="bill_type_1" class="form-select" name="bill_type_1" required>
              <option disabled>نوع قبض را انتخاب کنید</option>
              <option value="1">آب</option>
              <option value="2">برق</option>
              <option value="3">گاز</option>
              <option value="4">تلفن ثابت</option>
            </select>
          </div>
          <div class="row mb-3">
            <label for="bill_price" class="col-sm-2 col-form-label">قیمت(ریال)</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="bill_price_1" id="bill_price_1" required>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" value="<?php echo $data['id']; ?>" name="building_unit_id" />
      <div class="text-center">
        <button type="submit" class="btn btn-primary">تمام</button>
        <a href="<?php echo URL ?>dashboard/building_units_list_manage" class="btn btn-secondary">برگشت</a>
      </div>
    </form>
  </div>
</div>

<button type="button" class="btn btn-success" id="create_new_bill">افزودن قبض جدید</button>

<script>
  const billContainer = document.querySelector("#bill_container");
  const createBillBtn = document.querySelector('#create_new_bill');
  createBillBtn.addEventListener('click', () => {
    let length = billContainer.children.length;
    let newBill = `
      <div id="bill${length + 1}">
        <div class="row mb-3">
          <select id="bill_type_${length + 1}" class="form-select" name="bill_type_${length+1}">
            <option disabled>نوع قبض را انتخاب کنید</option>
            <option value="1">آب</option>
            <option value="2">برق</option>
            <option value="3">گاز</option>
            <option value="4">تلفن ثابت</option>
          </select>
        </div>
        <div class="row mb-3">
          <label for="bill_price_${length + 1}" class="col-sm-2 col-form-label">قیمت(ریال)</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="bill_price_${length + 1}" id="bill_price_${length + 1}" required>
          </div>
        </div>
      </div>
    `;
    billContainer.insertAdjacentHTML('beforeend', newBill);
  })
</script>
