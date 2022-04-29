<?php
    // This file is used to connect to the database of the project.
    // Now it is compatible.
    // Before running the project (rendering the pages in the browser), remember to chanege the parameters into the real production condition.
    // Copyright reserved by Chen. Follow MIT license.


    // Attach this file in the html page needs to communicate with db.
    
    // Create a mysqli instance. This process is using mysqli but not PDO. If you meet any problem of using mysqli, feel free to contact Chen.
    $connection = new mysqli("localhost","root","MySQL666!","test");

    if(!$connection){
        die("We can not connect to the database. Check the parameters and environment again.");
    }else{
        //FOR TEST
        // echo "We have connected to the database succesfully!";
    }


    // SQL sentence to excute the command
    $sql = "SELECT * FROM user WHERE username ='FDL'";

    // If you have cookies reserved, use the command like this:
    // $XXX = XXX
    // $sql = "SELECT * FROM user WHERE XXX ='$XXX'";

    $query_result_information = mysqli_query($connection,$sql);
    
    // We use assoc style here. You can acquire the return information through both numeric id or string key.
    $information = mysqli_fetch_assoc($query_result_information);
?>