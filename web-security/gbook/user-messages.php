<?php
/*
 * Демонстрация SQL инъекции
 */ 
require('../database.php');
require('../template/page.php');
$page->setProperty('%TITLE%', 'Сообщения пользователя');
$page->navigationLinks['index.php'] = 'Гостевая книга';
$page->navigationLinks['search.php'] = 'Поиск';
$page->showHeader(); 

// ID пользователя
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
	<label for="selUser">Выберите пользователя</label>
	<select for="selUser" name="id">
<?php
// Список пользователей
$res = mysql_query('SELECT id, name FROM user');
while ($row = @mysql_fetch_array($res, MYSQL_ASSOC))
{
	echo '<option value="', $row['id'], '"';
	if ($row['id'] == $id) echo ' selected="selected"';
	echo '>', $row['name'], '</option>';
}
?>
	</select>
	<button type="submit">Показать</button>
</form>

<?php if (!empty($id)): ?>
<h2>Сообщения пользователя #<?php echo $id?></h2>
<?php
// Запрос id, date, subject, message
$sql = 'SELECT id, date, subject, message FROM gbook WHERE user_id=' . $id;
$res = mysql_query($sql);
while ($row = @mysql_fetch_array($res, MYSQL_ASSOC))
{
	echo '<div>';
	echo '<h4>', $row['subject'], '</h4>';
	echo '<p>', $row['message'], '</p>';
	echo '</div>';
}
?>
<hr>
<?php 
	$userFile = $id . '.php';
	include($userFile); 

endif ?>
<?php $page->showFooter() ?>