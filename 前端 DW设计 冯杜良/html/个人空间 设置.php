<?php
  include "connect_to_db.php";
  // Use $information[xx] to get the information.
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>个人空间设置</title>
  <link rel="stylesheet" href="../web version 1 (3)(1)/web version 1/css/eg2.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial;
      padding: 10px;
      background: #f1f1f1;
      margin-left: 0px;
    }

    /* 头部标题 */
    .header {
      padding: 30px;
      text-align: center;
      background: white;
    }

    .header h1 {
      font-size: 50px;
    }

    /* 导航条 */
    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    /* 导航条链接 */
    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    /* 链接颜色修改 */
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    /* 创建两列 */
    /* Left column */
    .leftcolumn {
      margin-left: 50px;
      float: left;
      width: 70%;
    }

    /* 右侧栏 */
    .rightcolumn {
      float: right;
      width: 25%;
      background-color: #f1f1f1;
      padding-left: 20px;
    }

    /* 图像部分 */
    .fakeimg {
      background-color: #aaa;
      width: 100%;
      padding: 20px;
    }

    /* 文章卡片效果 */
    .card {
      background-color: white;
      padding: 30px;
      margin-top: 20px;
      padding-left: 150px;
      line-height: 50px;
      font-size: 18px;
    }

    /* 列后面清除浮动 */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* 底部 */
    .footer {
      padding: 20px;
      text-align: center;
      background: #ddd;
      margin-top: 20px;
    }

    /* 响应式布局 - 屏幕尺寸小于 800px 时，两列布局改为上下布局 */
    @media screen and (max-width: 800px) {

      .leftcolumn,
      .rightcolumn {
        width: 100%;
        padding: 0;
      }
    }

    /* 响应式布局 -屏幕尺寸小于 400px 时，导航等布局改为上下布局 */
    @media screen and (max-width: 400px) {
      .topnav a {
        float: none;
        width: 100%;
      }
    }
  </style>
</head>

<body>




  <div class="topnav">
    <a href="#">
      <img class="sdimlogo" src="../web version 1 (3)(1)/web version 1/images/LOGO.jpg" alt="sdim 的logo">
    </a>
    <a href="#" class="normala">分类</a>
    <a href="#" class="normala">发布</a>
    <a href="#" class="normala">管理</a>
    <div class="Search">
      <input type="text" class="search" placeholder="搜点啥吧">
      <button>
        <i>搜！</i>
      </button>
    </div>
    <a href="#" class="normala" style="float:right">收藏</a>
    <a href="#" class="normala" style="float:right">关注</a>
    <a href="#" style="float:right" class="usericon">
      <img class="icon" src="../web version 1 (3)(1)/web version 1/images/icon.jpg" />
    </a>
  </div>

  <div class="secondnav">
    <a href="#" class="normala2">分类</a>
    <a href="#" class="normala2">分类</a>
    <a href="#" class="normala2">课程笔记与详情</a>
    <a href="#" class="normala2">分类</a>
    <a href="#" class="normala2">分类</a>
    <a href="#" class="normala2">分类</a>
  </div>


  <div class="box1" style="margin: 50px 100px;">
    <img src="../img/杜证件照2.jpg" width="50" height "50" alt="" />
    <p1>abc 的空间</p1>
  </div>

  <div class="box2">
    <input style="border: none; font-size: 30px;" type="button" value="我的发布">　
    <input style="border: none; font-size: 30px;" type="button" value="收藏">　　
    <input style="border: none; font-size: 30px;text-decoration:underline;" type="button" value="设置">　　

  </div>

  <div class="row">
    <div class="leftcolumn">
      <div class="card">
        <h1 style="font-family: '华文新魏'">Information Card</h1>
        <span>
          <strong> 账号（昵称）:</strong>
          <?php echo ($information["card_number"]).'&nbsp'.($information["username"]); //We use non-breaking sp. here in order to make it more elegant.?> 
        </span>
        <br>
        <span>
          <strong>联系方式:</strong>
          <?php echo ("email:".'&nbsp'.$information["email"])?>
          <?php echo ("phone".'&nbsp'.$information["phone"]);?>
        </span>
        <br>

        <span>
          <strong>爱好／特长：</strong> 
            <?php echo htmlspecialchars($information["hobby"]);?>
        </span>

        <br>

      </div>


      <div class="card">
        <h2>修改</h2>
        
        <form method="post" action="个人空间 设置.php">
          账号 （昵称） <input type="text" size="30px" name="user_name">
          <br>
          密码 <input type="text" size="40px" name="user_password>
          <br>
          爱 好： <input type="text" size="36px" name="user_habit">
          <br>

          <label for="name"> 修改头像：</label>
          <input type="file" id="avaPhoto" name="picture" /></p>
          <!-- Please do not upload the picture when in development stage. I will find some efficient method to store the picture. -->

          <input type="submit" value="保存&提交">
          <input type="reset" value="清空"></p>
        </form>

        <?php 
          $USER_NAME = mysqli_real_escape_string($connection, $_POST['user_name']);
          $USER_PASSWORD = mysqli_real_escape_string($connection, $_POST['user_password']);
          $USER_HOBBY = mysqli_real_escape_string($connection, $_POST['user_habit']);

          // Create SQL sentence
          $sql_tran = "INSERT INTO user(username, password, hobby) VALUES ('$USER_NAME','$USER_PASSWORD','$USER_HOBBY'); ";

          // Execute the SQL query, save the information and check the result.
          if(mysqli_query($connection,$sql_tran)){
            // successful
            header('Location: re_login.php'); //TODO - for now we do not have a re_login.php, we use a easy page as a substitute.
          }else{
            // error
            echo 'query error - ' . mysqli_errno($connection);
          }
        ?>
      </div>
    </div>



    <!--
  <div class="rightcolumn">
    <div class="card">
      <h2>关于我</h2>
      <div class="fakeimg" style="height:100px;">图片</div>
      <p>关于我的一些信息..</p>
    </div>
    <div class="card">
      <h3>热门文章</h3>
      <div class="fakeimg"><p>图片</p></div>
      <div class="fakeimg"><p>图片</p></div>
      <div class="fakeimg"><p>图片</p></div>
    </div>
    <div class="card">
      <h3>关注我</h3>
      <p>一些文本...</p>
    </div>
  </div>
-->
  </div>

  <div class="footer">
    <h2>底部区域</h2>
  </div>

</body>

</html>