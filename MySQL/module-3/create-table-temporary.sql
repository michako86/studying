-- Испрользование БД по умолчанию
USE module3;

-- Создание таблицы № 1
CREATE TEMPORARY TABLE table4 
(
	a INT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Это типа колонка 1', 
	b CHAR(20) NOT NULL DEFAULT '' COMMENT 'Это типа колонка 2', 
	c FLOAT NULL COMMENT 'Это типа колонка 3'
);

INSERT INTO table4 VALUES (1, 'Hello', 123.123);
SELECT * FROM table4;


