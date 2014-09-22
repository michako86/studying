<?php
include 'classes/DB.class.php';
include 'classes/DVD.class.php';

if($_SERVER['REQUEST_METHOD']=='POST')
	include 'actions.inc.php';
?>
<!DOCTYPE html>

<html>
<head>
	<title>Новостная лента</title>
	<meta charset="utf-8" />
</head>
<body>
<a href="catalog.php?action=catalog">Каталог</a>
<hr>
<?php
switch($_GET['action']){
	case 'anthology':
		include 'get_anthology.inc.php';break;
	case 'list':
		include 'get_list.inc.php';break;
	case 'catalog':
	default:
		include 'get_catalog.inc.php';
}
?>
</body>
</html>