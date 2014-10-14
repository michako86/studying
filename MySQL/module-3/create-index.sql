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

-- Создадим индекс
CREATE INDEX ixName ON table2 (name);
CREATE INDEX ixPrice ON table2 (price);

-- Удаление индекса
DROP INDEX ixPrice ON table2;


-- Создание индекса при создании таблицы
DROP TABLE IF EXISTS table5;
CREATE TABLE table5 
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Код товара',
	code CHAR(4) NOT NULL DEFAULT 'AAAA', 
	name VARCHAR(50) NOT NULL DEFAULT '' COMMENT 'Название товара',
	price FLOAT NOT NULL DEFAULT 0 COMMENT 'Цена товара',
	CONSTRAINT pkId PRIMARY KEY (id),
	CONSTRAINT ixCode UNIQUE KEY (code),
	INDEX ixName (name),
	INDEX ixPrice (price)
) COMMENT 'Таблица товаров с ключом и индексами';

DROP TABLE IF EXISTS table6_child;
CREATE TABLE table6_child 
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Код записи',
	articul CHAR(4) NOT NULL DEFAULT 'AAAA' COMMENT 'Код товара', 	
	quo FLOAT NOT NULL DEFAULT 0 COMMENT 'Приход/расход товара',
	CONSTRAINT pkId PRIMARY KEY (id),
	CONSTRAINT fkTable5Code FOREIGN KEY (articul) 
		REFERENCES table5 (code),
	INDEX (articul)
);

-- Добавим товар
INSERT INTO table5 (code, name, price)
	VALUES ('ZZZZ', 'ПРоба', 16.8);
	
-- Приход товара
INSERT INTO table6_child (articul, quo) 
	VALUES ('ZZZZ', 10);

-- Ошибка в коде товара
INSERT INTO table5 (code, name, price)
	VALUES ('ZZZZ', 'ПРоба', 16.8);
INSERT INTO table6_child (code, quo) 
	VALUES ('XXXX', 10);