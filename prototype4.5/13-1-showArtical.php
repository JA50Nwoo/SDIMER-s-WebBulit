<?php
    define('NEW_PATH','images/');
	//连接到数据库
    $conn = mysqli_connect('localhost','root','','sql_test');
    //查询语句
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);
	$users = mysqli_fetch_all($result,MYSQLI_ASSOC);		   
	echo '<table>';
	//遍历查询到的结果,并将其显示到HTML代码中
	foreach($users as $u){
		echo '<tr><td>';
		echo "欢迎你，<strong>".$u['uname']."</strong><br/></td>";
		$realPhotoStored = NEW_PATH . $u['avaPhoto'];
		if(is_file($realPhotoStored) && filesize($realPhotoStored)>0){
			echo  '<td><img src="'.$realPhotoStored.'" alt="个人头像" width="150" height="200"/></td></tr>';
		}else{
			echo '<td><img src="images/default.jpg" alt="默认头像" width="150" height="200"/></td></tr>';
			}
		}
		echo "</table>";
		mysqli_close($conn);
?>