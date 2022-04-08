<?php session_start(); ?>
<!DOCTYPE html>

<html>
<meta charset="utf_8">
<title>测试主页</title>

</head>

<body>
    <?php
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
        echo "欢迎你：" . $name;
        echo '<a href ="logout.php"><input type="button" value="注销"/></a>';
    } else {
        echo '<a href ="login.php"><input type="button" value="登录"/></a>';
        echo '<a href ="registerWithCheck.php"><input type="button" value="注册"/></a>';
    }

    ?>

</body>
</head>



</html>