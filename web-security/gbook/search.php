<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
/*
 * Пример страницы поиска
 */ 

require('../database.php');
require('../template/page.php');

$page->setProperty('%TITLE%', "Поиск: $search");
$page->setProperty('%TEMPLATE_PATH%', '../template/');
$page->navigationLinks['index.php'] = 'Гостевая книга';
$page->navigationLinks['search.php'] = 'Поиск';
$page->showHeader();

if (!isset($_GET['pageNo'])) {
$pageNo = 0;
}
$start = $pageNo * 10;
$prev = $pageNo - 1;
$next = $pageNo + 1;
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
	<label for="txtSearch">Поиск: </label>
	<input id="txtSearch" type="text" name="search" value="<?php echo $search?>" />
	<button type="submit">Поиск</button>
</form>


<?php
if ($_GET['search'])
{
	// 10 записей гостевой книги? удовлетворяющих условию
	$sql = "SELECT  gbook.id, gbook.date, gbook.subject, gbook.message, 
					user.name, user.email
				FROM gbook 
					INNER JOIN user ON gbook.user_id = user.id
				WHERE gbook.subject LIKE '%$search%' 
				   OR gbook.message LIKE '%$search%' 
				   OR user.name LIKE '%$search%' 
				   OR user.email LIKE '%$search%' 
				ORDER BY gbook.date DESC
				LIMIT 10 OFFSET $start";
	$result = mysql_query($sql);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		echo "<div class=\"message\">
			<h4>{$row['subject']}</h4>
			<a href=\"mailto:{$row['email']}\">{$row['name']}</a>
			<p>{$row['message']}</p>
		</div>\n";
	}
}
?>

<div>
	<?php if ($pageNo > 0) echo "<a href=\"{$_SERVER['PHP_SELF']}?pageNo={$prev}\">Предыдущая</a> | "?> 
	Страница #<?php echo $pageNo?>
	<?php if (@mysql_num_rows($result) == 10) echo "| <a href=\"{$_SERVER['PHP_SELF']}?pageNo={$next}\">Следующая</a> | "?>
</div>


<?php $page->showFooter() ?>