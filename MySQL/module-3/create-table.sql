-- Создание таблицы данных
USE module3;

-- Посмотреть таблицы
SHOW TABLES;

-- Удаление таблицы
DROP TABLE IF EXISTS table1;

-- Создание таблицы с помощью описания
CREATE TABLE table1 
(
	id INT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Код товара',
	name VARCHAR(50) NOT NULL DEFAULT '' COMMENT 'Название товара',
	price FLOAT NOT NULL DEFAULT 0 COMMENT 'Цена товара'
) COMMENT 'Таблица товаров';

DESCRIBE table1;
DESC table1; 

-- Простое описание первичного ключа
CREATE TABLE t2
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	c1 VARCHAR(15)
);

-- Простое описание первичного ключа
CREATE TABLE t3
(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	c1 VARCHAR(15)
) AUTO_INCREMENT=100;

INSERT INTO t3(c1) VALUES('test');
SELECT * FROM t3;

-- Удаление таблицы
DROP TABLE IF EXISTS table2;

-- Создание таблицы с помощью описания
CREATE TABLE table2 
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Код товара',
	name VARCHAR(50) NOT NULL DEFAULT '' COMMENT 'Название товара',
	price FLOAT NOT NULL DEFAULT 0 COMMENT 'Цена товара',
	PRIMARY KEY (id)
) COMMENT 'Таблица товаров с первичным ключом';


-- Создание таблицы по образцу
CREATE TABLE table3 LIKE table2;


-- Создание таблицы на основе запроса
CREATE TABLE table4 COMMENT 'Результаты запроса'
	SELECT user, host, password
		FROM mysql.user;
	

-- Создание ВРЕМЕННОЙ таблицы на основе запроса
CREATE TEMPORARY TABLE table5 COMMENT 'Результаты запроса'
	SELECT user, host, password
		FROM mysql.user;




