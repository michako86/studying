<?php
/*
 * Административная часть сайта
 */ 
require('../template/page.php');
$_SESSION['login'] = 'Гость';
// Загрузка данных о пользователях
$f = @fopen('users.txt','r') or die('Error reading data file');
while ($line = trim(fgets($f, 4096)))
{
	if (strlen($line) == 0 && $line[0] == '#') continue;
	$parts = split(':', $line);
	$users[$parts[0]] = $parts[1];
}
fclose($f);
 
// Проверка логина и пароля пользователя
function isLoginOk($login, $password)
{
	global $users;
	return (array_key_exists($login, $users) && $users[$login] == $password);
} 
 
// Авторизация пользователя 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if (!isLoginOk($_POST['login'], $_POST['password'])){
		$_SESSION['error'] = 'Доступ запрещен';
		header('Location: index.php');
		exit;
	}else{
		if ($_SESSION['error'])
			unset($_SESSION['error']);
		$_SESSION['auth'] = true;
		$_SESSION['login'] = $_POST['login'];	
	}
}
// Стандартная страница
$page->setProperty('%TITLE%', 'Административная часть сайта');
$page->showHeader(); ?>
<?php
if ($_SESSION['error'])
	echo '<h2>'.$_SESSION['error'].'</h2>';
else
	echo '<h2>Добро пожаловать '.$_SESSION['login'].'!</h2>';	
if($_SESSION['auth']){
?>
	<p>Какие основные проблемы Вы видите в этом сценарии?</p>
<?php
}else{
?>
	<p>Введите в поля формы свои имя пользователя и пароль.</p>
	<form action="<?=$_SERVER["SCRIPT_NAME"]?>" method="POST">
	<label>Имя пользователя: </label><input type="text" name="login"><br>
	<label>Пароль: </label><input type="password" name="password"><br>
	<input type="submit" value="Войти">
	</form>
<?php 
}
$page->showFooter() ?>