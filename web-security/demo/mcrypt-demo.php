<?php
/*
 * Демонстрация модуля mcrypt
 */ 
require('../template/page.php');
$page->setProperty('%TITLE%', 'Пример использования симметричного шифрования');
$page->showHeader(); 

// MCRYPT_3DES, MCRYPT_CAST_128, MCRYPT_GOST, MCRYPT_RIJNDAEL_256 и т.п.
// http://ru.php.net/manual/ru/mcrypt.ciphers.php
$chipper = MCRYPT_GOST;


$key = substr(file_get_contents('key.txt'), 0, mcrypt_get_key_size($chipper, 'ecb'));

// Исходная строка
$text = (isset($_GET['text'])) ? $_GET['text'] : "Привет МИР!";

// Вектор инициализации
$iv_size = mcrypt_get_iv_size($chipper, MCRYPT_MODE_ECB);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

// Шифруем данные
$encrypted_data = mcrypt_ecb($chipper, $key, $text, MCRYPT_ENCRYPT, $iv);

// Вектор инициализации
$iv_size = mcrypt_get_iv_size($chipper, MCRYPT_MODE_ECB);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

// Ресшифровываем данные
$decrypted_data = trim(mcrypt_ecb($chipper, $key, $encrypted_data, MCRYPT_DECRYPT, $iv));

?> 


<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
	<div>
		<label for="txtString">Строка</label>
		<input id="txtString" type="text" name="text" value="<?php echo $text?>" style="width:40em"/>
		<button type="submit">Зашифровать</button>
	</div>	
</form>

<h3>Ключ: <?php echo $key?></h3>
<h3>Шифруем: <?php echo base64_encode($encrypted_data)?></h3>
<h3>Расшифровываем: <?php echo $decrypted_data?></h3>

<?php $page->showFooter() ?>