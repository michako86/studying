<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?= $count?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>В корзину</th>
</tr>
<?php
$goods = selectAllItems();
if(!is_array($goods)){
    echo 'Произошла ошибка';

} elseif(!$goods) {
   
    echo 'Товаров нет';
        
} else {
    
    foreach ($goods as $item) {
?>
<tr>
    <td><?php echo $item['title'];?></td>
    <td><?php echo $item['author'];?></td>
    <td><?php echo $item['pubyear'];?></td>
    <td><?php echo $item['price'];?></td>
    <td><a href="add2basket.php?id=<?=$item['id']?>">В корзину</a></td>
    
</tr>
<?php
    }
}
?>
</table>
</body>
</html>