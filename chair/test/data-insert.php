<?php
$page_title = '新增資料';
$page_name = 'data-insert';
require __DIR__ . '/parts/__connect_db.php';
require __DIR__ . '/parts/__admin_required.php';
?>
<?php require __DIR__ . '/parts/__html_head.php'; ?>
<?php
$row = $pdo->query("SELECT * FROM `i_secondhand_product` ")->fetch();

$c_sql = "SELECT * FROM i_secondhand_conditions ORDER BY sid ASC";
$cates = $pdo->query($c_sql)->fetchAll();

$h_sql = "SELECT * FROM i_secondhand_framework ORDER BY sid ASC";
$framework = $pdo->query($h_sql)->fetchAll();

$v_sql = "SELECT * FROM i_secondhand_material ORDER BY sid ASC";
$material = $pdo->query($v_sql)->fetchAll();

$g_sql = "SELECT * FROM i_secondhand_categories ORDER BY sid ASC";
$categories = $pdo->query($g_sql)->fetchAll();
?>
<style>
    span.red-stars {
        color: red;
    }

    small.error-msg {
        color: red;
    }
</style>
<?php include __DIR__ . '/parts/__navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div id="infobar" class="alert alert-success" role="alert" style="display: none">
                A simple success alert—check it out!
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增二手商品資料</h5>

                    <form name="form1" onsubmit="checkForm(); return false;" novalidate>
                        <div class="form-group">
                            <label for="product_no"><span class="red-stars">**</span> 商品編號</label>
                            <input type="text" class="form-control" id="product_no" name="product_no" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="productname"><span class="red-stars">**</span> 商品ID</label>
                            <input type="text" class="form-control" id="productname" name="productname" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="photo"><span class="red-stars">**</span> photo</label>
                            <input type="text" class="form-control" id="photo" name="photo" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="price"><span class="red-stars">**</span> 價錢</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="stock"><span class="red-stars">**</span> stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" required>
                            <small class="form-text error-msg"></small>
                        </div>
                        <div class="form-group">
                            <label for="description">商品描述</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="conditions_sid">商品狀況</label><br>
                            <?php foreach ($cates as $c) : ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="conditions_sid" id="conditions_sid<?= $c['sid'] ?>" value="<?= $c['sid'] ?>">
                                    <label class="form-check-label" for="conditions_sid<?= $c['sid'] ?>"><?= $c['name'] ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="framework_sid">骨架</label><br>
                            <?php foreach ($framework as $b) : ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="framework_sid" id="framework_sid<?= $b['sid'] ?>" value="<?= $b['sid'] ?>">
                                    <label class="form-check-label" for="framework_sid<?= $b['sid'] ?>"><?= $b['name'] ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="material_sid">材質</label><br>
                            <?php foreach ($material as $m) : ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" <?php //echo $row['category_sid']== $c['sid'] ? 'checked' : ''                                  
                                                                                    ?> name="material_sid" id="material_sid<?= $m['sid'] ?>" value="<?= $m['sid'] ?>">
                                    <label class="form-check-label" for="material_sid<?= $m['sid'] ?>"><?= $m['name'] ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="form-group">
                            <label for="categories_sid">分類</label>
                            <select class="form-control" id="categories_sid" name="categories_sid">
                                <?php foreach ($categories as $s) : ?>


                                    <option value="<?= $s['sid'] ?>"><?= $row['categories_sid'] == $s['sid'] ? 'selected' : '' ?><?= $s['name'] ?></option>


                                <?php endforeach; ?>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>






</div>
<?php include __DIR__ . '/parts/__scripts.php'; ?>
<script>
    // const email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    // const mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;
    // const $name = document.querySelector('#name');
    // const $email = document.querySelector('#email');
    // const $mobile = document.querySelector('#mobile');
    // const r_fields = [$name, $email, $mobile];
    const infobar = document.querySelector('#infobar');
    const submitBtn = document.querySelector('button[type=submit]');

    function checkForm() {
        let isPass = true;

        // r_fields.forEach(el => {
        //     el.style.borderColor = '#CCCCCC';
        //     el.nextElementSibling.innerHTML = '';
        // });
        // submitBtn.style.display = 'none';
        // // TODO: 檢查資料格式
        // if ($name.value.length < 2) {
        //     isPass = false;
        //     $name.style.borderColor = 'red';
        //     $name.nextElementSibling.innerHTML = '請填寫正確的姓名';
        // }

        // if (!email_pattern.test($email.value)) {
        //     isPass = false;
        //     $email.style.borderColor = 'red';
        //     $email.nextElementSibling.innerHTML = '請填寫正確格式的電子郵箱';
        // }

        // if (!mobile_pattern.test($mobile.value)) {
        //     isPass = false;
        //     $mobile.style.borderColor = 'red';
        //     $mobile.nextElementSibling.innerHTML = '請填寫正確的手機號碼';
        // }

        if (isPass) {
            const fd = new FormData(document.form1);

            fetch('data-insert-api.php', {
                    method: 'POST',
                    body: fd
                })
                .then(r => r.text())
                .then(obj => {
                    console.log(obj);
                    if (obj.success) {
                        infobar.innerHTML = '新增成功';
                        infobar.className = "alert alert-success";

                        setTimeout(() => {
                            location.href = 'data-list.php';
                        }, 2000)
                    } else {
                        infobar.innerHTML = obj.error || '新增成功';
                        infobar.className = "alert alert-success";

                        submitBtn.style.display = 'block';
                    }
                    infobar.style.display = 'block';
                });
        } else {
            submitBtn.style.display = 'block';
        }
    }
</script>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>