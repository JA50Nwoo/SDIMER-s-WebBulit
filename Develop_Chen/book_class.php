<?php 
    class Book{
        var $title;
        var $author;
        var $pages;

        function __construct($aTitle, $aAuthor, $aPages){
            $this->title = $aTitle; // Use notation $this to refer the object itself
            $this->author=$aAuthor;
            $this->pages = $aPages;

        }

        function bigPages(){
            if($this->pages >=600){
                return "true";
            }
            else return "false";
        }
    }
?>