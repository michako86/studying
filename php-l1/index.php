<?php
include './lib.inc.php';
include './data.inc.php';

$title = '���� ����� �����';
$header = "$welcome, �����!";
$id = strtolower(strip_tags(trim($_GET['id'])));

switch ($id) {
    case 'about':
        $title = '� �����';
        $header = '� ����� �����';
        break;
    case 'contact':
        $title = '��������';
        $header = '�������� �����';
        break;
    case 'table':
        $title = '������� ���������';
        $header = '������� ���������';
        break;
    case 'calc':
        $title = '��-���� �����������';
        $header = '�����������';
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
            <!-- ������� ����� �������� -->
            <img src="logo.gif" width="187" height="29" alt="��� �������" class="logo" />
            <span class="slogan">��������� � ��� �������</span>
            <!-- ������� ����� �������� -->
        </div>

        <div id="content">
            <!-- ��������� -->
            <h1><?php echo $header; ?></h1>
            <!-- ��������� -->

            <blockquote>
                <?php
                echo "������� $day �����, $mon �����, $year ���.";
                ?>
            </blockquote>
            <!-- ������� ��������� �������� -->
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
            
            <!-- ������� ��������� �������� -->
        </div>
        <div id="nav">
            <!-- ��������� -->
            <h2>��������� �� �����</h2>
            <!-- ���� -->
<?php
drawMenu($leftMenu);
?>
            <!-- ���� -->
            <!-- ��������� -->
        </div>
        <div id="footer">
            <!-- ������ ����� �������� -->
<?php drawMenu($leftMenu, false); ?>

            &copy; <?php echo COPYRIGHT ?>, 2000 - <?= strftime('%Y') ?>
            <!-- ������ ����� �������� -->
        </div>
    </body>
</html>