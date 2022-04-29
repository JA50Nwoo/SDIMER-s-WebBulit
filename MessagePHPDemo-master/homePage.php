
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
        echo '<a href ="exit.php"><input type="button" value="注销"/></a>';
    } else {
        echo '<a href ="login1.1.php"><input type="button" value="登录"/></a>';
        echo '<a href ="registerWithCheck.php"><input type="button" value="注册"/></a>';
    }

    ?>

</body>
</head>



</html>