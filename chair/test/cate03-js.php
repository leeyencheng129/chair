<?php

$categories = array(
    array('sid' => '1', 'name' => '程式設計', 'parent_sid' => '0'),
    array('sid' => '2', 'name' => '繪圖軟體', 'parent_sid' => '0'),
    array('sid' => '3', 'name' => '網際網路應用', 'parent_sid' => '0'),
    array('sid' => '4', 'name' => 'PHP', 'parent_sid' => '1'),
    array('sid' => '5', 'name' => 'JavaScript', 'parent_sid' => '1'),
    array('sid' => '7', 'name' => 'PS', 'parent_sid' => '2'),
    array('sid' => '8', 'name' => 'Chrome', 'parent_sid' => '3'),
    array('sid' => '9', 'name' => '騙錢的', 'parent_sid' => '3'),
    array('sid' => '10', 'name' => 'C++', 'parent_sid' => '1'),
    array('sid' => '16', 'name' => '椅拉', 'parent_sid' => '2')
);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <script>
        const rows = <?= json_encode($categories, JSON_UNESCAPED_UNICODE) ?>;
        const cates = [];
        for (i = 0; i <= rows.length; i++) {
            cates[i] = i
            console.log(cates)
        }
    </script>
</body>

</html>