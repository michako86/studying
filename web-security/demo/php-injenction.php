<?php
/*
 * "Простой" калькулятор
 */ 
require('../template/page.php');
$page->setProperty('%TITLE%', '"Простой" калькулятор');
$page->showHeader(); 
$string = (isset($_GET['string'])) ? $_GET['string'] : '2 * 2';
eval("\$result = ($string);");
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
	<label for="txtString">Выражение: </label>
	<input id="txtString" type="text" name="string" value="<?php echo $string?>"/>
	<button type="submit">Считать</button>
</form>

<h3>Результат: <?php echo $string, ' = ',  $result?></h3>

<?php $page->showFooter() ?>