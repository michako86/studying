<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/*
 * Проверка пользователя
 */ 
require('database.php');
// Если передавалась форма
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$userId = getUserId($email, $password);
	if ($userId > 0)
	{
		// Пользователь аутентифицирован
		$_SESSION['user_authenticate'] = true;
		
		// Пользователь правильный: узнаем его разрешения
		$_SESSION['privilegies'] = getUserPrivilegies($userId);
		
		// Если указан адрес возврата, возвращаемся...
		if ($_SESSION['returnURL'])
		{
			$returnURL = $_SESSION['returnURL'];
			$_SESSION['returnURL'] = '';
			header('Location: ' . $returnURL);
			exit;
		}
		else
		{
			header('Location: /web-security/gbook');
			exit;			
		}
	}
	else 
	{
		// Пользователь аутентифицирован
		$_SESSION['user_authenticate'] = false;	
	
		// Пользователь неправильный
		$errorMessage = 'Ошибка ввода логина/пароля';
	}
}

require('template/page.php');
$page->setProperty('%TITLE%', 'Аутентификация пользователя');
$page->setProperty('%TEMPLATE_PATH%', 'template/');
$page->showHeader(); 
?>

<script type="text/javascript">
window.onload = function()
{
	document.getElementById('frmLogin').onsubmit = function()
	{
		if (document.getElementById('txtEmail').value == '')
		{
			alert('Укажите Ваш E-mail');
			document.getElementById('txtEmail').focus();
			return false;
		}
		if (document.getElementById('txtPassword').value == '')
		{
			alert('Укажите Ваш пароль');
			document.getElementById('txtPassword').focus();
			return false;
		}	
		return true;
	}
	document.getElementById('txtEmail').focus();
}
</script>

<form id="frmLogin" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<fieldset>
		<legend>Аутентификация пользователя</legend>
		<div>
			<label for="txtEmail">Ваш E-mail</label>
			<input id="txtEmail" type="text" name="email" value='<?php echo $login?>'/>
		</div>
		<div>
			<label for="txtPassword">Ваш пароль</label>
			<input id="txtPassword" type="password" name="password" />
		</div>		
		<div id="buttonDiv">
			<button type="submit">Вход</button>
		</div>		
	</fieldset>
	
	<?php if ($errorMessage) echo '<div id="errorMessage">', $errorMessage, '</div>'; ?>	
</form>

<?php 
mysql_close();
$page->showFooter();
?>