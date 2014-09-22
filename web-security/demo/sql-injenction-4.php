<?php
/*
 * Демонстрация SQL инъекции
 */ 
require('../database.php');
require('../template/page.php');
$page->setProperty('%TITLE%', 'Демонстрация SQL инъекции');
$page->showHeader(); 

$email = 'vasya@mail.ru';
$id = 0;
$sql = 'SQL запрос не выполнялся...';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// Используем подготовленный запрос
	$sql = "PREPARE sqlUser FROM 'SELECT id FROM user WHERE email = ? AND password = ?'";
	echo '<pre>', $sql, '</pre>';
	mysql_query($sql) OR die('Ошибка подготовки запроса');
	
	// Ввод логина
	$sql = "SET @email = '$email'";
	echo '<pre>', $sql, '</pre>';
	mysql_query($sql) OR die('Ошибка email: ' . $email);
	
	// Ввод пароля
	$sql = "SET @password = '$password'";
	echo '<pre>', $sql, '</pre>';
	mysql_query($sql) OR die('Ошибка password: ' . $password);	
	
	// Запрос id пользователя
	$sql = "EXECUTE sqlUser USING @email, @password";
	$res = mysql_query($sql);
	echo '<pre>', $sql, '</pre>';
	if (mysql_num_rows($res) != 0)
		$id = mysql_result($res, 0, 'id');
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<div>
		<label for="txtEmail">E-mail</label>
		<input id="txtEmail" type="text" name="email" value="<?php echo $email?>"/>
	</div>
	<div>
		<label for="txtPassword">Пароль</label>
		<input id="txtPassword" type="text" name="password"  value="<?php echo $password?>"/>
	</div>	
	<div>
		<button type="submit">Вход</button>
	</div>	
</form>
<p>Попробуйте ввести в качестве пароля:
<blockquote>' OR 1=1 OR name='</blockquote>

<h3>ID пользователя: <?php echo $id?></h3>
<hr><h4>SQL запрос</h4><pre><?php echo $sql?></pre>
<?php $page->showFooter() ?>