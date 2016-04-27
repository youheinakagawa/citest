<?php

    //受け取ったPOSTを表示
    print_r($_POST);

    //初期化（別にいらない）
    $name = "xxx";
    $email = "xxx@xxx.com";

    //受け取り
    if(isset($_POST['name'])) $name = $_POST['name'];
    if(isset($_POST['email'])) $email = $_POST['email'];
?>
<!doctype html>
<html>
<head>
<title>res</title>
</head>
<body>
name:<span id="name2"><?php echo $name; ?></span><br>
email:<span id="email2"><?php echo $email; ?></span>
</body>
</html>