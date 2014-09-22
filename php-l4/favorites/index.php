<?php
include_once 'classes/Favorites.class.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Наши рекомендации</title>
	<meta charset="utf-8" />
<style>
	div#header{border-bottom:1px solid black;text-align:center;width:80%}
	div#a, div#b, div#c{width:30%; height:200px;float:left}
	
</style>
</head>
<body>
	<div id='header'>
		<h1>Мы рекомендуем</h1>
	</div>
	<div id='a'>
		<h2>Полезные сайты</h2>
		<ul><?php /* Список сайтов */ ?></ul>
	</div>
	<div id='b'>
		<h2>Полезные приложения</h2>
		<ul><?php /* Список приложений */ ?></ul>
	</div>
	<div id='c'>
		<h2>Полезные статьи</h2>
		<ul><?php /* Список статей */ ?></ul>
	</div>
</body>
</html>