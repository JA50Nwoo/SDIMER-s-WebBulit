<?php
header("Content-type: text/html; charset=utf-8");
//echo '删除';

// 取得传过来的id
if(isset($_GET['id'])){
//    echo $_GET['id'];
}
$con=mysqli_connect("localhost","root","","MessageDB");
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}

mysqli_query($con,"INSERT INTO passedMessages
 SELECT *  FROM messages WHERE id= {$_GET['id']}" );
 mysqli_query($con,"DELETE FROM Messages WHERE id={$_GET['id']}");

// 删除成功
echo '文章已通过';
mysqli_close($con);
?>