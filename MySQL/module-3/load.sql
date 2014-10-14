-- Создание таблицы данных
USE module3;

-- Создание таблицы с помощью описания
DROP TABLE IF EXISTS table2;
CREATE TABLE table2 
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Код товара',
	name VARCHAR(50) NOT NULL DEFAULT '' COMMENT 'Название товара',
	price FLOAT NOT NULL DEFAULT 0 COMMENT 'Цена товара',
	PRIMARY KEY (id)
) COMMENT 'Таблица товаров с первыичнм ключом';

-- Загрузка данных
LOAD DATA 
	INFILE 'D:/MySQL/module-3/data.txt' 
	INTO TABLE table2
	FIELDS TERMINATED BY '\t'
	LINES TERMINATED BY '\r\n';
	
	
	
	
	