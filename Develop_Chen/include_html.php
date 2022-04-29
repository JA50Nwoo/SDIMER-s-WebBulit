<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    <head>
    <body>
        <?php include "gogogo.html" ?>
        <p>我是傻逼吧</p>
        <?php include "gogogo.html" ?>

        <?php
            $name = "Jim";
            include "gogogo.php";
            sayHello($name);
            echo $age;
        ?>

        <p>我是傻逼吧</p>
        <hr>
        <?php 
            include "book_class.php";
            
            $book1 = new Book('金瓶梅','金陵笑笑生',900);
            $book2 = new Book('Harry Potter', "JK", 300);
                echo $book1->title;
                echo $book1->author;
                echo $book1->pages;
            
                echo $book1->bigPages();
                echo $book2->bigPages();
                

        ?>

    </body>
</html>