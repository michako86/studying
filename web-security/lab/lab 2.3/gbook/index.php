<?php
/*
 * Пример страницы по шаблону
 */ 

 
/* Если нет привилегий на просмотр гостевой книги отправляем пользователя на авторизацию
if (!$_SESSION['privilegies'] || !array_key_exists('GBOOK_SELECT', $_SESSION['privilegies']))
{
	$_SESSION['returnURL'] = $_SERVER['PHP_SELF'];
	header('Location: ../login.php?errorMessage=У вас нет привилегий на просмотр гостевой книги');
	exit;
}
*/
require('../database.php');
require('../template/page.php');
$page->setProperty('%TITLE%', 'Гостевая книга');
$page->setProperty('%TEMPLATE_PATH%', '../template/');
$page->navigationLinks['index.php'] = 'Гостевая книга';
$page->navigationLinks['search.php'] = 'Поиск';
$page->showHeader(); 

// Последние 10 записей гостевой книги
$sql = "SELECT  gbook.id, gbook.date, gbook.subject, gbook.message, 
				user.name, user.email
			FROM gbook 
				INNER JOIN user ON gbook.user_id = user.id
			ORDER BY gbook.date DESC
			LIMIT 10";
$result = mysql_query($sql);

while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	echo "<div class=\"message\">
		<h4>{$row['subject']}</h4>
		<a href=\"mailto:{$row['email']}\">{$row['name']}</a>
		<p>{$row['message']}</p>
	</div>\n";
}
/*
INSERT INTO `role_privilege` (`privilege_code`, `role_id`) VALUES ('GBOOK_SELECT', 1);
*/
?>

<?php $page->showFooter() ?>