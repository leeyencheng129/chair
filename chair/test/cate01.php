<?php
require __DIR__ . '/parts/__connect_db.php';

$rows = $pdo->query("SELECT * FROM `categories`  ")->fetchAll();


$cates = [];

foreach ($rows as $k => $v) {
    if ($v['parent_sid'] == '0') {
        $cates[] = $v;  //array push
    }
}

foreach ($cates as $k => $v) {
    foreach ($rows as $k2 => $v2) {

        if ($v['sid'] == $v2['parent_sid']) {
            $cates[$k]['children'][] = $v2;
        }
    }
}


echo json_encode($cates, JSON_UNESCAPED_UNICODE);
