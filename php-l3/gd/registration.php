<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if(!$_SESSION['randStr']) {
       $result = "Включи картинки"; 
    } else {
        if($_SESSION['randStr'] == $_POST['str']) {
            $result = "Хорошо";
        } else {
            $result = "Плохо";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
<h1>Регистрация</h1>
<form action="" method="post">
	<div>
		<img src="noise-picture.php">
	</div>
	<div>
		<label>Введите строку</label>
		<input type="text" name="str" size="6">
	</div>
	<input type="submit" value="OK">
</form>
<?php 
echo $result;
?>
</body>
</html>
