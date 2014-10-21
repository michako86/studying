<?php
/*
index.php
index.php?id=about
index.php?id=contact
index.php?id=table
index.php?id=calc
 *  */
/*����*/
$leftMenu = array(
    array('link'=>'�����', 'href'=>'index.php'),
    array('link'=>'� ���', 'href'=>'index.php?id=about'),
    array('link'=>'��������', 'href'=>'index.php?id=contact'),
    array('link'=>'������� ���������', 'href'=>'index.php?id=table'),
    array('link'=>'�����������', 'href'=>'index.php?id=calc')
);
/*******************************************************/

/*
* �������� ������� ��� � ���� ������ �� 00 �� 23
* � �������� ������ � ������ ����� �� 0 �� 23
*/
$hour = (int)strftime('%H');
$welcome = '';// �������������� ���������� ��� �����������

if($hour > 0 and $hour < 6) {
    $welcome = "������ ����";
} elseif($hour >= 6 and $hour < 12) {
    $welcome = "������ ����";
} elseif($hour >= 12 and $hour < 18) {
    $welcome = "������ ����";
} elseif($hour >= 18 and $hour < 23) {
    $welcome = "������ �����";
} else {
    $welcome = "����������";
}


// ��������� ������ � ����� �������� ����
setlocale(LC_ALL, "russian");
$day = strftime('%d');
$mon = strftime('%B');
$year = strftime('%Y');

define('COPYRIGHT', '����� ���� ���-������');



$size = ini_get('post_max_size'); // 50M
$letter = $size{strlen($size)-1}; // M

$size = (int)$size; // 50

switch(strtoupper($letter)) {
    case 'G' :  $size *=  1024;        
    case 'M' :  $size *=  1024;   
    case 'K' :  $size *=  1024;  
}
