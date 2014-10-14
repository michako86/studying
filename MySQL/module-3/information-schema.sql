-- Схема БД сервера
USE information_schema;

-- Таблицы схемы
SHOW TABLES;

-- ТАблицы БД
DESC tables;

-- Список таблиц указанной БД
SELECT table_name, table_comment
	FROM information_schema.tables
	WHERE table_schema = 'module3';

-- Спецификация колонок для таблицы table2 БД module3
SELECT column_name, data_type, column_comment
	FROM information_schema.columns
	WHERE table_schema = 'module3'
	  AND table_name = 'table2';
	
-- Список БД	
SELECT *
	FROM information_schema.schemata \G