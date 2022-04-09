<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录</title>
    <style>
        error {
            color: red;
        }
    </style>
</head>

<body>


    <?php
    //函数判断传入表单的信息是否安全（处理全是空格之类的睿智情况）可以用来转化用户名和密码
    function checkInfo($Data)
    {
        //$Data = trim($Data);//清除data中的空格
        $Data = htmlspecialchars($Data); //将html的特殊字符转化掉，避免被控制
        $Data = stripslashes($Data); //去除反斜杠（转义字符，可以用作恶意代码）
        return $Data;
    }
    //其实php可以不用给初始值，但是担心后面的echo要打印会报错，所以给出
    $username = $userpassword = "";
    $isInfoAvailable = false;
    //错误提示信息，在输入框旁边显示，初始值是必填项目
    $errorusername = $erroruserpassword = "必填项目";

    //下面开始判断信息是否为空，是否合法
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $isInfoAvailable = true;
        if (empty($_POST["userName"])) {
            $isInfoAvailable = false;
            //改写错误提示信息即可
            $errorusername = "用户名不能为空";
        } else {
            if (!preg_match("/^[\w]*$/", $_POST["userName"])) {
                $errorusername = "只允许字母和数字";
            } else {
                $username = checkInfo($_POST["userName"]);
            }
        }
        if (empty($_POST["password"])) {
            $isInfoAvailable = false;
            $erroruserpassword = "密码不能为空";
        } else {

            if (!preg_match("/^\d{6,14}$/", $_POST["password"])) {
                $erroruserpassword = "密码长度限制6~14";
            } else {
                $userpassword = checkInfo($_POST["password"]);
            }
        }

        // if($errorusername =="必填项目"&&$erroruserpassword=="必填项目"){

        //     $isInfoAvailable = true;

        // }
    }


    if ($isInfoAvailable == true) {
        $dbServername = "localhost"; //服务器名字
        $dbUsername = "root"; //用户名
        $dbPassword = "";
        $dbname = "names"; //数据库名字


        $coon = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbname); //大范围到小范围，服务器到数据库

        if (!$coon) {
            die("connect failed");
        } else {
            // echo "connect success!";
        }

        if ($isInfoAvailable) {
            $sql = "SELECT name FROM names WHERE name='$username' ";
            $result = mysqli_query($coon, $sql);
            $test = mysqli_fetch_assoc($result);
            if ($test == false) {
                $errorusername = "用户名不存在";
            } else {
                $sql = "SELECT name,password FROM names 
                WHERE (name='$username' and password='$userpassword')";
                $result = mysqli_query($coon, $sql);
                $test = mysqli_fetch_assoc($result);
                if ($test == false) {
                    $erroruserpassword = "密码错误";
                } else {
                    echo "登陆成功";
                    $_SESSION['name']=$name;//创建一个会话，并且传入name这个数据，指的是用户进入网站到关闭的这段时间。
                    echo"<script type=\"text/javascript\">";
                    echo" window.location.href='homepage.php';";
                    echo"</script>";
                }
            }
        }
    }
    ?>

    <form method="post" action="login.php">


        用户名：<input type="text" name="userName">
        <?php echo  "<span class=error>*" . $errorusername . "</span>"; ?>
        <br>
        密码：<input type="password" name="password">
        <?php echo  "<span class=error>*" . $erroruserpassword . "</span>"; ?>
        <br>
        <input type="submit" value="登录">

    </form>
</body>

