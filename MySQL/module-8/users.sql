-- Пользователь fedya
CREATE USER 'fedya'@'%';
SET PASSWORD FOR 'fedya'@'%' = PASSWORD('abc');

CREATE USER 'vasya'@'%' IDENTIFIED BY 'abc';


USE mysql;
SELECT user, host, password
	FROM mysql.user;
