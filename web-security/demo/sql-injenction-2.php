<?php
/*
 * Демонстрация SQL инъекции
 */ 
require('../database.php');
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
// Запрос id, date, subject, message
$sql = 'SELECT id, date, subject, message FROM gbook WHERE user_id=' . $id;
$res = @mysql_query($sql);
while ($row = @mysql_fetch_array($res, MYSQL_ASSOC))
{
	echo '<tr>';
	foreach ($row as $value) echo '<td>', $value, '</td>';
	echo '</tr>';
}


?>
</table>

<hr><h4>SQL запрос</h4><p><?php echo $sql?></p>
<?php $page->showFooter() ?>