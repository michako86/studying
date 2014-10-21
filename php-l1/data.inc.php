<?php
/*
index.php
index.php?id=about
index.php?id=contact
index.php?id=table
index.php?id=calc
 *  */
/*Меню*/
$leftMenu = array(
    array('link'=>'Домой', 'href'=>'index.php'),
    array('link'=>'О нас', 'href'=>'index.php?id=about'),
    array('link'=>'Контакты', 'href'=>'index.php?id=contact'),
    array('link'=>'Таблица умножения', 'href'=>'index.php?id=table'),
    array('link'=>'Калькулятор', 'href'=>'index.php?id=calc')
);
/*******************************************************/

/*
* Получаем текущий час в виде строки от 00 до 23
* и приводим строку к целому числу от 0 до 23
*/
$hour = (int)strftime('%H');
$welcome = '';// Инициализируем переменную для приветствия

if($hour > 0 and $hour < 6) {
    $welcome = "Доброй ночи";
} elseif($hour >= 6 and $hour < 12) {
    $welcome = "Доброе утро";
} elseif($hour >= 12 and $hour < 18) {
    $welcome = "Добрый день";
} elseif($hour >= 18 and $hour < 23) {
    $welcome = "Добрый вечер";
} else {
    $welcome = "Здравствуй";
}


// Установка локали и выбор значений даты
setlocale(LC_ALL, "russian");
$day = strftime('%d');
$mon = strftime('%B');
$year = strftime('%Y');

define('COPYRIGHT', 'Супер Мега Веб-мастер');



$size = ini_get('post_max_size'); // 50M
$letter = $size{strlen($size)-1}; // M

$size = (int)$size; // 50

switch(strtoupper($letter)) {
    case 'G' :  $size *=  1024;        
    case 'M' :  $size *=  1024;   
    case 'K' :  $size *=  1024;  
}
