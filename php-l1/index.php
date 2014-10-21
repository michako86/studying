<?php
include './lib.inc.php';
include './data.inc.php';

$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'])));

switch ($id) {
    case 'about':
        $title = 'О сайте';
        $header = 'О нашем сайте';
        break;
    case 'contact':
        $title = 'Контакты';
        $header = 'Обратная связь';
        break;
    case 'table':
        $title = 'Таблица умножения';
        $header = 'Таблица умножения';
        break;
    case 'calc':
        $title = 'Он-лайн калькулятор';
        $header = 'Калькулятор';
        break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <title><?php echo $title; ?></title>
        <meta http-equiv="content-type"
              content="text/html; charset=windows-1251" />
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>

        <div id="header">
            <!-- Верхняя часть страницы -->
            <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
            <span class="slogan">приходите к нам учиться</span>
            <!-- Верхняя часть страницы -->
        </div>

        <div id="content">
            <!-- Заголовок -->
            <h1><?php echo $header; ?></h1>
            <!-- Заголовок -->

            <blockquote>
                <?php
                echo "Сегодня $day число, $mon месяц, $year год.";
                ?>
            </blockquote>
            <!-- Область основного контента -->
            <?php
            switch ($id) {
                case 'about': include 'about.php';
                    break;
                case 'contact': include 'contact.php';
                    break;
                case 'table': include 'table.php';
                    break;
                case 'calc': include 'calc.php';
                    break;
                default: include 'index.inc.php';
            }
            ?>
            
            <!-- Область основного контента -->
        </div>
        <div id="nav">
            <!-- Навигация -->
            <h2>Навигация по сайту</h2>
            <!-- Меню -->
<?php
drawMenu($leftMenu);
?>
            <!-- Меню -->
            <!-- Навигация -->
        </div>
        <div id="footer">
            <!-- Нижняя часть страницы -->
<?php drawMenu($leftMenu, false); ?>

            &copy; <?php echo COPYRIGHT ?>, 2000 - <?= strftime('%Y') ?>
            <!-- Нижняя часть страницы -->
        </div>
    </body>
</html>