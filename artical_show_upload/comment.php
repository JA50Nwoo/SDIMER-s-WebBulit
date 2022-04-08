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
		div{
			margin: 0 auto;
			margin-bottom:10px;
			width: 20%;
			padding: 10px;
			border:1px solid black;

		}	
		</style>
	</head>
	<body>
		<form  action="comment.php" enctype="multipart/form-data" method="POST">  
			<label >评论内容：</label>
			<input  style="width:80%" type="text" id="name" name="comment" />
			<br/>
			<input type="submit" value="提交" name="submit" />
        </form>
		<br/>
		<br/>
		<?php
			$host='xdm72191586.my3w.com';
			$username='xdm72191586';
			$password='Hdj13752854072';
			$dbname='xdm72191586_db';
			$conn = mysqli_connect($host,$username,$password,$dbname);//连接到数据库
			$query = "SELECT * FROM comment";//查询comment这个表
			$result = mysqli_query($conn,$query);//结果给$result
			$comments = mysqli_fetch_all($result,MYSQLI_ASSOC);//将所有result行取出来，并按照一定规则排序
			foreach($comments as $u){ //遍历comments数组
				echo "<div>
					<span>{$u['content']}</span>
					<span>{$u['comment_time']}<span>
					</div>
				";
			}
        ?>
    </body>
</html>
<?php
	if(isset($_POST['submit'])){
		$artical_number='4';
		$content=$_POST['comment'];
		$comment_time=date("Y-m-d");//date("Y-m-d H:i:s")显示时间
		if(!empty($artical_number) && !empty($content)&&!empty($comment_time)){
			$conn = mysqli_connect($host,$username,$password,$dbname);//连接到数据库
			$query = "INSERT INTO comment VALUES(0,'$artical_number','$content','$comment_time')";//数据库中向comment表中插入信息
			mysqli_query($conn,$query);//操作数据库
		}
	}
?>