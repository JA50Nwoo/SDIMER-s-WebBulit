<?php
$dbServername="localhost";//服务器名字
$dbUsername="root";//用户名
$dbPassword="";
$dbname="names";//数据库名字


$coon= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbname);//大范围到小范围，服务器到数据库

if(!$coon)
{
    die("connect failed");

}
else{
    echo"connect success!";
}

$username=$_POST['userName'];//键值就是html的name
$userpassword=$_POST['password'];

$sql="INSERT INTO names(name,password)
VALUES('$username','$userpassword')";
//此处用变量名还是需要单引号，首先因为是传入服务器的sql语句，大语句需要用双引号
//其次 values传入数据库的变量是字符串，用单引号
//$sql是你需要服务器执行的myqsl语句（因此要用双引号连接）



if (mysqli_query($coon,$sql))////query是请求语句
//$coon传入可以识别要改变的是哪个数据库，在users这个数据库里面找names这个数据表，
//再改写相应字段

{
    echo"insert successfully";

}
else
{
    echo"insert failed";

}


?>
