<?php
$id = $news->claerInt($_GET['del']);
if($id) {
    if(!$news->deleteNews($id)) {
        $errMsg = "Произошла ошибка на удаление записи";
    } else {
        header('Location: news.php');
        exit();
    }
} 