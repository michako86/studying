<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/*
 * Административная часть сайта
 */ 
require('../template/page.php');

/*
// Загрузка данных о пользователях
$f = @fopen('users.txt','r') or die('Error reading data file');
while ($line = trim(fgets($f, 4096)))
{
	if (strlen($line) == 0 && $line[0] == '#') continue;
	$parts = split(':', $line);
	$users[$parts[0]] = $parts[1];
}
fclose($f);
*/
/*
// Проверка логина и пароля пользователя
function isLoginOk($login, $password)
{
	global $users;
	return (array_key_exists($login, $users) && $users[$login] == $password);
} 
*/
 /*
// Авторизация пользователя 
if (!isLoginOk($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']))
{
	
	header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
	header('Content-Type: text/html; charset=utf-8');
    echo '<h1>Доступ запрещен</h1>';
	exit;
}
*/
// Стандартная страница
$page->setProperty('%TITLE%', 'Административная часть сайта');
$page->showHeader(); ?>

<h2>Добро пожаловать, <?php echo $_SERVER['PHP_AUTH_USER']?>! </h2>
<p>Какие основные проблемы Вы видите в этом сценарии?</p>
<p>Измените сценарий так, чтобы решить эти проблемы.</p>
<?php $page->showFooter() ?>