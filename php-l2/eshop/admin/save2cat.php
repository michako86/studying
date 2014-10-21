<?php
	// подключение библиотек
    require "secure/session.inc.php";
    require "../inc/lib.inc.php";
    require "../inc/db.inc.php";

    $author = claerStr($_POST['author']);
    $title = claerStr($_POST['title']);
    $pubyear = claerInt($_POST['pubyear']);
    $price = claerInt($_POST['price']);
    
    if(!addItemToCatalog($title, $author, $pubyear, $price)) {
        echo "Произошла ошибка при добавление товара";
    } else {
        header('Location: add2cat.php');
        exit;
        
    }
    
	
?>