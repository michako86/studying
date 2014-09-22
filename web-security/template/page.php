<?php
/*
 * Создание и наполнение объекта PAGE
 */
require('page.class.php');
$page = new Page();

// Свойтсва страницы по умолчанию
$page->defaultProperties['%SITE_ROOT%'] = '/web-security';

// Дефолтовая навигация
$page->navigationLinks['/web-security/admin/'] = 'Вход администратора';

// Шапка
$page->header = <<<END_HEADER
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>%TITLE%</title>
	<link rel="stylesheet" type="text/css" href="%SITE_ROOT%/template/main.css" />
</head>
<body>
	<div id="header">
		<h1>%TITLE%</h1>
	</div>
	<div id="content">
	<!-- Begin of main content -->
END_HEADER;

// Подвал
$page->footer = <<<END_FOOTER
	<!-- End of main content -->
	</div>
	<div id="navigation">
		<ul>
			%NAVIGATION%
		</ul>
	</div>
</body>
</html>
END_FOOTER;
?>