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




INSERT INTO table2
	VALUES (10, 'Товар', 123.5);
	
INSERT INTO table2
	VALUES (NULL, 'Товар', 123.5);	
	
	
INSERT INTO table2 (name, price)
	VALUES ('Товар', 123.5);
	

INSERT INTO table2 VALUES 
	(21, 'Товар 21', 12.5),
	(22, 'Товар 22', 123.5),
	(23, 'Товар 23', 12.5),
	(24, 'Товар 24', 123.5),
	(25, 'Товар 25', 12.5),
	(26, 'Товар 26', 12.5),
	(27, 'Товар 27', 123.5);
	
	
INSERT IGNORE INTO table2 VALUES 
	(21, 'Товар 21', 12.5),
	(42, 'Товар 22', 123.5),
	(43, 'Товар 23', 12.5),
	(44, 'Товар 24', 123.5),
	(45, 'Товар 25', 12.5),
	(46, 'Товар 26', 12.5),
	(47, 'Товар 27', 123.5);	
	

INSERT INTO table2 (name, price)
	SELECT user, 123 as price
		FROM mysql.user;

		
		
		
-- Отключим индексы	 (для движка MyISAM)
ALTER TABLE table2 DISABLE KEYS;	
-- Произведем добавление записей	
INSERT IGNORE INTO table2 VALUES 
	(41, 'Товар 21', 12.5),
	(42, 'Товар 22', 123.5),
	(43, 'Товар 23', 12.5),
	(44, 'Товар 24', 123.5),
	(45, 'Товар 25', 12.5),
	(46, 'Товар 26', 12.5),
	(47, 'Товар 27', 123.5);		
-- Вкючим индексы 	(для движка MyISAM)	
ALTER TABLE table2 ENABLE KEYS;		


	