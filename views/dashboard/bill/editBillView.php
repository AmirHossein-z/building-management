<section class="section dashboard">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">ویرایش اطلاعات قبض</h5>
                    <form class="row g-3" method="POST"
                        action="<?php echo URL ?>dashboard/edited_bill/<?php echo $data['info']['id']; ?>">
                        <div class="col-12">
                            <label for="bill_type" class="form-label">نوع قبض:</label>
                            <select name="bill_type" id="bill_type" class="form-select">
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <?php if ($data['info']['type'] === $i) { ?>
                                        <option value="<?php echo $data['info']['type']; ?>" selected>
                                            <?php echo $this->bill_enum[$data['info']['type']]; ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?php echo $i; ?>">
                                            <?php echo $this->bill_enum[$i]; ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="bill_price" class="form-label">قیمت:</label>
                            <input type="number" class="form-control" name="bill_price" id="bill_price"
                                value="<?php echo $data['info']['price'] ?>" />
                        </div>
                        <div class="col-12">
                            <label for="bill_status" class="form-label">وضعیت:</label>
                            <select name="bill_status" id="bill_status">
                                <option value="0" <?php echo ($data['info']['status'] === 0) ? 'selected' : ''; ?>><?php echo $this->bill_status[0]; ?></option>
                                <option value="1" <?php echo ($data['info']['status'] === 1) ? 'selected' : ''; ?>><?php echo $this->bill_status[1]; ?></option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">ویرایش</button>
                            <a href="<?php echo URL ?>dashboard/building_units_list_manage"
                                class="btn btn-secondary">برگشت</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>