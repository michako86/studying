<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '90148');
define('DB_NAME', 'ws');

mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);
mysql_query('SET NAMES utf8');

function getPass($string, $salt, $iterationCount)
{
	for ($i = 0; $i < $iterationCount; $i++)
		$string = md5($string . $salt);
	return $string;
}

// Проверка логина и пароля пользователя в БД
function getUserId($email, $password)
{

	$sql = "SELECT id, name, email, password, salt, iteration
			FROM user
			WHERE email = '$email'
			";
			
	$result = mysql_query($sql);
	if(!$result ) {
		return 0;
	}
	$row = mysql_fetch_assoc($result);
	
	$hash  = getPass($password, $row['salt'], $row['iteration']);
		
	if ($hash == $row['password']) {
		return $row['id'];
	} else {
		return 0;
	}
	
	/*
	$sql = "SELECT id 
				FROM user
				WHERE email = '$email'
				  AND password = '$password'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) return 0;
	return mysql_result($result, 0, 'id');
	*/
}

// Функция волзвращает массив разрешений пользователя
function getUserPrivilegies($userId)
{
	$userPrivilegies = array();
	
	
	$sql = "SELECT privilege_code
			FROM role_privilege
				INNER JOIN user_role ON role_privilege.role_id = user_role.role_id
			WHERE user_role.user_id = $userId ";
    
	$result = mysql_query($sql);
	if($result) {
		while ($row = mysql_fetch_assoc($result)) {
			$userPrivilegies[$row['privilege_code']] = $userId;
		}
	}
			
	/* 	Допишите здесь код получния списка разрешений пользователя
		Для получения списка разрешений используйте следующий запрос:
		
		SELECT privilege_code
			FROM role_privilege
				INNER JOIN user_role ON role_privilege.role_id = user_role.role_id
			WHERE user_role.user_id = $userId
			
		разрешения пользователя добавьте в массив $userPrivilegies
	*/
	return $userPrivilegies;
}
?>