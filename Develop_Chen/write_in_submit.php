<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>I miss U so much but silently.</title>
    <body>
        <form action = "write_in_submit.php" method = "post">
            User Name:<input type = "text" name = "user_name">
            <br>
            User ID:<input type ="text" name = "ID">
            <br>
            <input type = "submit"> <!--The information input will be included in url and been passed to php program from url.-->
        </form>
        <hr>
        Hello! You name is <?php echo $_POST["user_name"] ?> <!--$_GET method will get the information in url.-->
        <br>
        Please check your id. Your ID should be <?php echo $_POST['ID']?> <!--IF using $_POST , the information will not be passed through url, which means that it's a more secure route from client-to-server. -->
    </body>
</html>