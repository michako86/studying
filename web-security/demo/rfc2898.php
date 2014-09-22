<?php
/*
 * Засолка пароля
 */ 
require('../template/page.php');
$page->setProperty('%TITLE%', 'Хеширование по RFC2898');
$page->showHeader(); 

$string = 'Проба';
$salt = '';
$iterationCount = 100;
$result = '';

function getRFC2898_MD5($string, $salt, $iterationCount)
{
	for ($i = 0; $i < $iterationCount; $i++)
		$string = md5($string . $salt);
	return $string;
}

function getRFC2898_SHA1($string, $salt, $iterationCount)
{
	for ($i = 0; $i < $iterationCount; $i++)
		$string = sha1($string . $salt);
	return $string;
}

if ($_SERVER['QUERY_STRING'])
{
	$string = $_GET['srring'];
	$salt = $_GET['salt'];
	$iterationCount = (int) $_GET['n'];
	$resultMD5 = 'MD5: ' . getRFC2898_MD5($string, $salt, $iterationCount);
	$resultSHA1 = 'SHA1: ' . getRFC2898_SHA1($string, $salt, $iterationCount);
}

// Генерация соли
if (!$salt)
	$salt = str_replace('=', '', base64_encode(md5(microtime() . '1FD37EAA5ED9425683326EA68DCD0E59')));



?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
	<div>
		<label for="txtString">Строка</label>
		<input id="txtString" type="text" name="srring" value="<?php echo $string?>" style="width:40em"/>
	</div>
	<div>
		<label for="txtSalt">Соль</label>
		<input id="txtSalt" type="text" name="salt" value="<?php echo $salt?>"  style="width:40em"/>
	</div>	
	<div>
		<label for="txtIterationCount">Число иттераций</label>
		<input id="txtIterationCount" type="text" name="n" value="<?php echo $iterationCount?>"  style="width:4em"/>
	</div>		
	<div>
		<button type="submit">Посчитать</button>
	</div>	
</form>

<h3><?php echo $resultMD5?></h3>
<h3><?php echo $resultSHA1?></h3>

<?php $page->showFooter() ?>