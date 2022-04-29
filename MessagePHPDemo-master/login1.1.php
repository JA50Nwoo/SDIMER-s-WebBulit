<?php
session_start();
$_SESSION['id'] = null;
$_SESSION['username'] = null;
$_SESSION['permission'] = null;
$dbServername = "localhost"; //服务器名字
$dbUsername = "root"; //用户名
$dbPassword = "";
$dbname = "messagedb"; //数据库名字

//函数判断传入表单的信息是否安全（处理全是空格之类的睿智情况）可以用来转化用户名和密码
function checkInfo($Data)
{
    $Data = trim($Data); //清除data中的空格
    $Data = htmlspecialchars($Data); //将html的特殊字符转化掉，避免被控制
    $Data = stripslashes($Data); //去除反斜杠（转义字符，可以用作恶意代码）
    return $Data;
}
//其实php可以不用给初始值，但是担心后面的echo要打印会报错，所以给出
$isInfoAvailable = false;
//错误提示信息，在输入框旁边显示，初始值是必填项目
$errorusername = $errorpassword = "必填项目";
//下面开始判断信息是否为空，是否合法
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST["username"])) {
        //改写错误提示信息即可
        $errorusername = "用户名不能为空";
    } else {
        $username = checkInfo($_POST["username"]);
    }
    if (!preg_match("/^[\w]*$/", $_POST["username"])) {
        $errorusername = "只允许字母和数字";
    } else {
        if (empty($_POST["password"])) {
            $errorpassword = "密码不能为空";
        } else {

            if (!preg_match("/^\d{6,14}$/", $_POST["password"])) {
                $errorpassword = "密码长度限制6~14";
            } else {
                $password = checkInfo($_POST["password"]);
                $isInfoAvailable = true;
            }
        }
    }


    // if($errorusername =="必填项目"&&$erroruserpassword=="必填项目"){

    //     $isInfoAvailable = true;

    // }
}
if ($isInfoAvailable == true) {
    if (!isset($_SESSION['username'])) {
            $errorpassword = "1";
            $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbname); //大范围到小范围，服务器到数据库
            if (!$conn) {
                die("connect failed");
            } else {
                $sql = "SELECT username FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                $test = mysqli_fetch_assoc($result);
                if ($test == false) {
                    $errorusername = "用户名不存在";
                } else {
                    $user_username = mysqli_real_escape_string($conn, $username);
                    $user_password = mysqli_real_escape_string($conn, $password);
                    //$sql = "SELECT 'id', 'username' ，'permission' FROM 'users' WHERE 'username'='$user_username' AND 'password'='$user_password'";
                    $sql = "SELECT id, username,permission FROM users WHERE username='$user_username' AND password='$user_password'";
                    $result2 = mysqli_query($conn, $sql);
                    if ($result2 == false) {
                        $errorpassword = "密码错误";
                    } else {
                        // $test = mysqli_fetch_assoc($result);
                        $test = mysqli_num_rows($result2);
                        if ($test == 1) {
                            $row = mysqli_fetch_array($result2);
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['permission'] = $row['permission'];
                            header('Location:mainPage.html?permission='.$_SESSION['permission']);
                            //header("Location:mainPage.html");
                            // if($_SESSION['permission']==1){
                            //     header('Location:mainPageForM.html?permission='.$_SESSION['permission']);

                            // }
                            // else{
                            //     header('Location:mainPageForNormal.html?permission='.$_SESSION['permission']);
                            // }
                            
                            
                           
                        }
                    }
                }
            }
        
    } else {
        //$home_url = 'addMessage.php';
        //$errorpassword = $_SESSION['username'];
        
        //header('Location: ' . $home_url);
    }
}








 


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>SDIMER'S</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>


<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container">
            <div class="logo">
                <img class="icon" src="LOGO.jpg" />
            </div>

            <div class="title">SDIMER'S</div>

            <div class="inputs">
                <label>USERNAME</label>
                <input type="text" name="username" placeholder="Enter Username" value="<?php if (!empty($username)) echo $username; ?>" />
                <?php echo  "<span class=error>*" . $errorusername . "</span>"; ?>
                <label>PASSWORD</label>
                <input type="password" name="password" placeholder="Enter password" />
                <?php echo  "<span class=error>*" . $errorpassword . "</span>"; ?>

                <div class="btn-container">
                    <span class="strip-1"></span>
                    <span class="strip-2"></span>
                    <span class="strip-3"></span>
                    <span class="strip-4"></span>
                    <span class="strip-5"></span>
                    <span class="strip-6"></span>
                    <span class="strip-7"></span>
                    <button type="submit" class="btn">LOGIN</button>
                </div>
            </div>
            <div class="line">
                <a href="#">Forgot password?</a>
                <span id="dot">.</span>
                <a href="registerWithCheck.php">Sign Up for SDIMER'S</a>
            </div>
        </div>
</body>


</html>