<?php
//require './NewsDB.class.php';

$title = $news->claerStr($_POST['title']);
$description = $news->claerStr($_POST['description']);
$source = $news->claerStr($_POST['source']);
$category = $news->claerInt($_POST['category']);

if(empty($title) or empty($description)) {
  $errMsg = "Заполните обязательные поля";  
} else {
    if(!$news->saveNews($title, $category, $description, $source)) {
        $errMsg = "Произошла ошибка при записи";
    } else {
        header('Location: news.php');
        exit();
    }
    
    
}