<?php if (count($data['building_unit_info']) > 0) { ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="info-box card p-4">
                <h4>واحد با شماره
                    <?php echo $data['building_unit_info']['number'] ?>
                </h4>
                <p>به نام<span>
                        <?php
                        echo $_SESSION['name'] ?>
                    </span></p>
            </div>
        </div>
        <div class="col-lg-4">
            <form action="<?php echo URL ?>dashboard/update_accounting" method="post">
                <input type="hidden" name="building_unit_id" value="<?php echo $data['building_unit_info']['id']; ?>" />
                <input type="hidden" name="accounting_id" value="<?php echo $data['accounting_id']; ?>" />
                <button type="submit" class="btn btn-success">بروزرسانی مقدار حساب</button>
            </form>
        </div>
    </div>
    <?php if (count($data['bills']) > 0) { ?>
        <div class="row">
            <?php foreach ($data['bills'] as $bill) { ?>
                <div class="col-lg-4">
                    <div class="info-box card p-4">
                        <div>
                            <p>نوع قبض: <span>
                                    <?php echo $bill['type'] ?>
                            </p>
                            <p>قیمت: <span>
                                    <?php echo $bill['price'] ?> تومان
                            </p>
                            <div class="m-2 d-flex gap-3 justify-content-end align-items-center">
                                <a href="<?php echo URL ?>dashboard/edit_bill/<?php echo $bill['id'] ?>"
                                    class="btn btn-primary">ویرایش</a>
                                <form method="POST" action="<?php echo URL ?>dashboard/delete_bill/17"><button type="submit"
                                        class="btn btn-danger">حذف</button></form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>در حال حاضر برای این واحد قبضی صادر نشده است</p>
    <?php } ?>
    <p>مقدار حساب شما:
        <?php echo $data['balance'] ?>
        تومان
    </p>
<?php } else { ?>
    <p>در حال حاضر واحد ساختمانی با این مشخصات پیدا نشد</p>
    <a href="<?php echo URL ?>dashboard/index">برگشت به صفحه اصلی</a>
<?php } ?>