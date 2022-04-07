<?php
    define('NEW_PATH','images/');
	//连接到数据库
    $conn = mysqli_connect('localhost','root','','prototype4.5');
    //查询语句
    $query = "SELECT * FROM artical";
    $result = mysqli_query($conn,$query);
	$articals = mysqli_fetch_all($result,MYSQLI_ASSOC);		   
	//遍历查询到的结果,并将其显示到HTML代码中
	foreach($articals as $u){
		echo '<tr><td>';
		$link = $u['artical_link'];
		echo "<a href='{$link}' title=''>123123</a>";
		echo
		mysqli_close($conn);
?>