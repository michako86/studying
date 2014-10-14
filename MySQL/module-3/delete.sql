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

-- Удаление записей
DELETE FROM table2
	WHERE id = 1;
	
	
-- Удаление последней записи
DELETE FROM table2
	ORDER BY id DESC
	LIMIT 1;
	
	
-- Удаление первой записи
DELETE FROM table2
	ORDER BY id
	LIMIT 1;	
	
	
	
	
	
	