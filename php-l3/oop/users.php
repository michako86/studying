<?php
header('Content-Type: text/html; charset=utf-8');

function __autoload($name) {
 require "classes/".$name.".class.php";
}

$user = new SuperUser("Петр", "peter", "45454", "root");

$user1 = new User("Вася", "vasya", "454544");
$user2 = new User("Вася2", "vasya2", "454544");
$user3 = new User("Вася3", "vasya3", "454544");
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

$user->showInfo();
echo "<hr/>";
echo "<br/>Пользователей: <br/>";
echo User::$cntU;
echo "<br/>Админов: <br/>";
echo SuperUser::$cntSU;
echo "<br/><br/>";




?>