-- Создание нового пользователя
CREATE USER 'vasya'@'localhost' 
	IDENTIFIED BY 'pass@word1';

-- Права на доступ к таблицам БД
GRANT 
	SELECT, INSERT, DELETE, UPDATE, EXECUTE 
	ON ws.* TO 'vasya'@'localhost'
	WITH MAX_USER_CONNECTIONS 50;

-- Команда на применение привелегий
-- mysqladmin -uroot -ppassword flush-privileges 

-- Вход пользователя
-- mysql -uvasya -ppass@word1 ws
