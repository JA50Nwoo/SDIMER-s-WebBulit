<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
</head>

<body>


    <?php

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

    //接下来判断传入表单的信息是否安全（处理全是空格之类的睿智情况）可以用来转化用户名和密码
    function checkInfo($Data)
    {
        //$Data = trim($Data);//清除data中的空格
        $Data = htmlspecialchars($Data); //将html的特殊字符转化掉，避免被控制
        $Data = stripslashes($Data); //去除反斜杠（转义字符，可以用作恶意代码）
        return $Data;
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
        $sql = "SELECT name FROM names WHERE name= '$username' ";

        $result = mysqli_query($coon, $sql); //返回的是结果集 不是布尔
        $resultOfCheck = mysqli_fetch_assoc($result);
        if ($resultOfCheck) {
            $errorusername = "用户名已经存在";
        } else {
            $sql = "INSERT INTO names(name,password)VALUES('$username','$userpassword')";
            if (mysqli_query($coon, $sql)) {
                echo "注册成功";
            } else {
                echo "注册失败";
            }
        }


        // $sql = "INSERT INTO names(name,password)VALUES('$username','$userpassword')";
        // //此处用变量名还是需要单引号，首先因为是传入服务器的sql语句，大语句需要用双引号
        // //其次 values传入数据库的变量是字符串，用单引号
        // //$sql是你需要服务器执行的myqsl语句（因此要用双引号连接）



        // if (mysqli_query($coon, $sql)) ////query是请求语句
        // //$coon传入可以识别要改变的是哪个数据库，在users这个数据库里面找names这个数据表，
        // //再改写相应字段

        // {
        //     //echo "insert successfully";
        // } else {
        //     echo "insert failed";
        // }
        // mysqli_query($coon, $sql);

        //$_SERVER是一个储存包含了很多信息的数组，属于php超全局变量中的一个
        //$_SERVER['REQUEST_METHOD']：访问页面使用的请求方法；例如，"GET", "HEAD"，"POST"，"PUT"。
        //超全局变量：https://www.runoob.com/php/php-superglobals.html
        //此处用处是：只有以post方式提交了表单，数据库才会进行下面的操作


    }
    ?>

    <form method="post" action="registerWithCheck.php">

        <!-- 也可以写成'action="<//?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> -->
        <!--$_SERVER['PHP_SELF']:  当前执行脚本的文件名-->

        用户名：<input type="text" name="userName">
        <?php
        echo $errorusername;
        ?>
        <!-- 打印错误信息 -->
        <br>
        密码：<input type="password" name="password">
        <?php
        echo $erroruserpassword;
        ?>
        <br>
        <input type="submit" value="注册">
        <!-- 如果 input type不是关键字，则显示输入栏-->
        <!--

        value= 代表默认填入的值 用户名和密码默认是空，因此不写value 但是按钮可以改变成提交
        input type关键字：https://www.w3schools.com/html/html_form_input_types.asp
        -->

        <!-- submit关键字可以使得这个input变成按钮，按钮上的显示默认为”提交“ -->

    </form>
</body>