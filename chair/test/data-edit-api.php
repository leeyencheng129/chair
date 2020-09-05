<?php
require __DIR__ . '/parts/__connect_db.php';
require __DIR__ . '/parts/__admin_required.php';
header('Content-Type: application/json');


$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

// TODO: 檢查資料格式
// email_pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
// mobile_pattern = /^09\d{2}-?\d{3}-?\d{3}$/;

// if (empty($_POST['sid'])) {
//     $output['code'] = 405;
//     $output['error'] = '沒有 sid';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }

// if (mb_strlen($_POST['name']) < 2) {
//     $output['code'] = 410;
//     $output['error'] = '姓名長度要大於 2';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }

// if (!preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $_POST['mobile'])) {
//     $output['code'] = 420;
//     $output['error'] = '手機號碼格式錯誤';
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }

// `i_secondhand_product`(`product_no`, `productname`, `photo`, `price`, `description`, `stock`, `conditions_sid`, `categories_sid`, `material_sid`, `framework_sid`

$sql = "UPDATE `i_secondhand_product` SET 
    `product_no`=?,
    `productname`=?,
    `photo`=?,
    `price`=?,
    `description`=?,
    `stock`=?,
    `conditions_sid`=?,
    `categories_sid`=?,
    `material_sid`=?,
    `framework_sid`=?
    WHERE `sid`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['product_no'],
    $_POST['productname'],
    $_POST['photo'],
    $_POST['price'],
    $_POST['description'],
    $_POST['stock'],
    $_POST['conditions_sid'],
    $_POST['categories_sid'],
    $_POST['material_sid'],
    $_POST['framework_sid'],
    $_POST['sid'],
]);

if ($stmt->rowCount()) {
    $output['success'] = true;
};

echo json_encode($output, JSON_UNESCAPED_UNICODE);
