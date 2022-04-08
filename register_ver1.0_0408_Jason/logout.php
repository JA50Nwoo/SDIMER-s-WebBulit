<?php

session_start();
if(isset($_SESSION['name']))//判断是否存在某个变量
{
    session_unset();
    session_destroy();
}
header("location:homepage.php");
?>