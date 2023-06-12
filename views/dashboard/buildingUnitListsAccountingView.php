<?php if ($_SESSION['role'] === 'role-manager') { ?>
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
                                <td>
                                    <a class="btn btn-warning"
                                        href="<?php echo URL ?>dashboard/accounting/<?php echo $building_unit['id']; ?>">حساب این
                                        واحد</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <p>در حال حاضر برای این ساختمان واحدی وجود ندارد</p>
        <a class="btn btn-secondary" href="<?php echo URL; ?>dashboard/index">برگشت به صفحه اصلی</a>
    <?php } ?>
<?php } else if ($_SESSION['role'] === 'role-member') { ?>
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
                                        <?php echo $bill['price'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                </div>
        <?php } else { ?>
                <p>در حاضر قبضی برای شما ثبت نشده است</p>
        <?php } ?>
            <p>مقدار حساب شما:
            <?php echo $data['balance'] ?>
                تومان
            </p>
    <?php } else { ?>
            <p>در حال حاضر واحدی ندارید</p>
            <a href="<?php echo URL ?>dashboard/index">برگشت به صفحه اصلی</a>
    <?php } ?>
<?php } ?>