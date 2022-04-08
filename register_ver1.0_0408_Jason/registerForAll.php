<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    //$_SERVER是一个储存包含了很多信息的数组，属于php超全局变量中的一个
    //$_SERVER['REQUEST_METHOD']：访问页面使用的请求方法；例如，"GET", "HEAD"，"POST"，"PUT"。
    //超全局变量：https://www.runoob.com/php/php-superglobals.html
    //此处用处是：只有以post方式提交了表单，数据库才会进行下面的操作
    {
        $dbServername = "localhost"; //服务器名字
        $dbUsername = "root"; //用户名
        $dbPassword = "";
        $dbname = "names"; //数据库名字


        $coon = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbname); //大范围到小范围，服务器到数据库

        if (!$coon) {
            die("connect failed");
        } else {
            echo "connect success!";
        }

        $username = $_POST['userName']; //键值就是html的name
        $userpassword = $_POST['password'];

        $sql = "INSERT INTO names(name,password)VALUES('$username','$userpassword')";
        //此处用变量名还是需要单引号，首先因为是传入服务器的sql语句，大语句需要用双引号
        //其次 values传入数据库的变量是字符串，用单引号
        //$sql是你需要服务器执行的myqsl语句（因此要用双引号连接）



        if (mysqli_query($coon, $sql)) ////query是请求语句
        //$coon传入可以识别要改变的是哪个数据库，在users这个数据库里面找names这个数据表，
        //再改写相应字段

        {
            echo "insert successfully";
        } else {
            echo "insert failed";
        }
    }
    ?>

    <form method="post" action="registerForAll.php">

        <!-- 也可以写成'action="<//?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> -->
        <!--$_SERVER['PHP_SELF']:  当前执行脚本的文件名-->
        
        用户名：<input type="text" name="userName"><br>
        密码：<input type="password" name="password"><br>
        <input type="submit" value="注册">
        <!-- 如果 input type不是关键字，则显示输入栏-->
        <!--

        value= 代表默认填入的值 用户名和密码默认是空，因此不写value 但是按钮可以改变成提交
        input type关键字：https://www.w3schools.com/html/html_form_input_types.asp
        -->

        <!-- submit关键字可以使得这个input变成按钮，按钮上的显示默认为”提交“ -->

    </form>
</body>