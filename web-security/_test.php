<?php
/*
 * Пример страницы по шаблону
 */ 
require('template/page.php');
$page->setProperty('%TITLE%', 'Просто проба');
$page->setProperty('%TEMPLATE_PATH%', 'template/');
$page->showHeader(); ?>

<p>просто тест</p>

<?php $page->showFooter() ?>