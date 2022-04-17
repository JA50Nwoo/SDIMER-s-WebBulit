<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>I miss U so much but silently.</title>
    <body>
        <form action = "key_value_array.php" method = "post">
            <input type = 'text' name = 'Student'>
            <input type = 'submit'>
        </form>

        <?php 
            $grade = array("Harry"=>90, "Jim"=>100, "Steven"=>60);
            $grade["Harry"] = 99;
            // echo $grade["Harry"]."</br>";
            
            // echo count($grade);
            echo $_POST["Student"]." got ".($grade[$_POST["Student"]]);
        ?>
    </body>
</html>