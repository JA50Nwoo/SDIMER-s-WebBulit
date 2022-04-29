 <?php
    session_start();

    header("Content-type: text/html; charset=utf-8"); //设置字符集，windows的默认编码是GBK
    //header("location:http://baidu.com") 可以实现直接跳转 跳转到百度页面
    //header('refresh: 3;url=http://weibo.com'); 三秒后跳转到微博（延迟转向）

    if (isset($_SESSION['username'])) {
        $date = $message = '';
        $date = $_POST['date'];
        $message = $_POST['message'];
        // 数据库数据
        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "MessageDB";
        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        // 检测连接
        if ($conn->connect_error) //取得对象（$conn）的connect_error属性,如果有的话返回true；
        {
            die("连接失败: "  . $conn->connect_error); //与exit（）一样，输出一个消息并且退出当前脚本
        }
        global $message, $date;
        $sql = "INSERT INTO Messages (date, content) VALUES ('$date', '$message')";

        if ($conn->query($sql) === TRUE) {
            //    echo "新记录插入成功";
            echo '您留言成功了哟！！！';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // 关闭数据库
        $conn->close();
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <title>留言</title>
 </head>

 <body>
     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <div style="margin-left: 450px; margin-top: 20px;
                height: 250px; width: 250px">
             <h1>发布留言</h1>
             <a href="showMessage.php">查看留言</a>
             <br />
             <a href="exit.php">退出登录</a>
             <br />
             <div>
                 <br />
                 请选择日期：
                 <br />
                 <input type="date" name="date">
                 <br /><br />
                 请输入您的留言：
                 <input type="textarea" size="40" name="message">
                 <br /><br />
                 <div style="margin-left: 20px">
                     <input type="submit" value="提交">
                 </div>
             </div>
         </div>
     </form>
 </body>

 </html>