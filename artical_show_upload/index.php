<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
	     <title></title>
	    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
		<style>
		form{
			width:100%;
			text-align: center;
			margin-top:20px;
		}
		input.text{
			width: 400px;
			margin: 20px;
			padding-left: 20px;
		}
		img{
			margin:10px;
			border:1px solid;
			width: 350px;
			height: 300px;
		}
		a{
			margin:10px;
			border:1px solid;
		}	
		</style>
	</head>
	<body>
		<p1>h1llo</p1>
		<form  action="index.php" enctype="multipart/form-data" method="POST">  
			<label for="name">文章标题：</label>
			<input type="text" id="name" name="title" />
			<br/>
			<label for="name">文章类型(1-3)：</label>
			<input type="text" id="name" name="type" />
			<br/>
			<label for="name">上传封面：</label>
			<input type="file" id="avaPhoto" name="picture" />
			<br/>
			<label for="name">上传文章：</label>
			<input type="file" id="avaPdf" name="artical" />
			<br/>
			<input type="submit" value="提交" name="submit" />
			<input type="reset" value="重置" name="reset" />
        </form>
		<form method="get">
			<input  type="submit"  value="类型1" name="submit1"/>
			<input  type="submit"  value="类型2" name="submit2"/>
			<input  type="submit"  value="类型3" name="submit3"/>
		</form>
		<br/>
		<br/>
		
    </body>
</html>
 
<?php
       //这里要填写关于数据库信息（此处没填）
	$host='';
	$username='';
	$password='';
	$dbname='';
	define('NEW_PATH_photo','images/');
	define('NEW_PATH_artical','artical/');
   if(isset($_GET['submit1'])){
	 //连接到数据库
	 $conn = mysqli_connect($host,$username,$password,$dbname);
	 //查询语句
	 $query = "SELECT * FROM artical";
	 $result = mysqli_query($conn,$query);
	 $articals = mysqli_fetch_all($result,MYSQLI_ASSOC);		   
	 //遍历查询到的结果,并将其显示到HTML代码中
	 foreach($articals as $u){
		 if($u['artical_type']==1){
			echo '<tr><td>';
			$target_artical = NEW_PATH_artical.$u['artical_link'];
			$title2=$u['artical_title'];
			echo "<a href='{$target_artical}' title=''>$title2</a>";
			echo"<br/>";
			$target_picture = NEW_PATH_photo.$u['artical_picture'];
			echo "<img src='{$target_picture}' />";
			echo"<br/>";
		 }
	 }
   }
   if(isset($_GET['submit2'])){
		$conn = mysqli_connect($host,$username,$password,$dbname);
		//查询语句
		$query = "SELECT * FROM artical";
		$result = mysqli_query($conn,$query);
		$articals = mysqli_fetch_all($result,MYSQLI_ASSOC);		   
		//遍历查询到的结果,并将其显示到HTML代码中
		foreach($articals as $u){
			if($u['artical_type']==2){
			echo '<tr><td>';
			$target_artical = NEW_PATH_artical.$u['artical_link'];
			$title2=$u['artical_title'];
			echo "<a href='{$target_artical}' title=''>$title2</a>";
			echo"<br/>";
			$target_picture = NEW_PATH_photo.$u['artical_picture'];
			echo "<img src='{$target_picture}' />";
			echo"<br/>";
			}
		}
    }
	if(isset($_GET['submit3'])){
		$conn = mysqli_connect($host,$username,$password,$dbname);
		//查询语句
		$query = "SELECT * FROM artical";
		$result = mysqli_query($conn,$query);
		$articals = mysqli_fetch_all($result,MYSQLI_ASSOC);		   
		//遍历查询到的结果,并将其显示到HTML代码中
		foreach($articals as $u){
			if($u['artical_type']==3){
			   echo '<tr><td>';
			   $target_artical = NEW_PATH_artical.$u['artical_link'];
			   $title2=$u['artical_title'];
			   echo "<a href='{$target_artical}' title=''>$title2</a>";
			   echo"<br/>";
			   $target_picture = NEW_PATH_photo.$u['artical_picture'];
			   echo "<img src='{$target_picture}' />";
			   echo"<br/>";
			}
		}
	}
   //在当前php文件所在目录下,新建一个images文件夹,用于专门存放上传的图片
  
   if(isset($_POST['submit'])){
	   $head="'";
	   $title = $head.$_POST['title'].$head; //获取文章标题和类型
	   $type = $_POST['type'];
	   //获取到上传的图片和文章
	   $picture = $_FILES['picture']['name']; //（单个文件时）$_FILES[文件][获取数据选项]通过这个超级变量获取上传的图片的某些数据
	   echo $picture;
	   $artical = $_FILES['artical']['name'];
	   echo $artical;
	   if(!empty($title) && !empty($picture)&&!empty($artical)){
		   $target_picture = NEW_PATH_photo . $picture; //images文件夹路径与图片名称拼接，作为新的相对地址
		   $target_artical = NEW_PATH_artical . $artical;
		   if(move_uploaded_file($_FILES['picture']['tmp_name'],$target_picture)&&move_uploaded_file($_FILES['artical']['tmp_name'],$target_artical)){ //转移，从原来的tmp临时文件夹转移到指定目标文件夹
			   //连接到数据库
			   $conn = mysqli_connect($host,$username,$password,$dbname);
			   $query = "INSERT INTO artical VALUES(0,'$picture','$type','$artical',$title)";
			   mysqli_query($conn,$query);
		    }
	    }
	}
?>
