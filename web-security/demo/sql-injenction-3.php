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
	// Используем mysql_escape_string
	$email = mysql_escape_string($_POST['email']);
	$password = mysql_escape_string($_POST['password']);
	
	// Запрос id пользователя
	$sql = "SELECT id FROM user WHERE email='$email' AND password='$password'";
	$res = mysql_query($sql);
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