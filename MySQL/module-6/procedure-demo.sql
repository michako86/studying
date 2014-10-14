-- Создание базы данных
CREATE DATABASE IF NOT EXISTS module6;
USE module6;

-- Копия таблиц для демонстрации
CREATE TABLE courses SELECT * FROM course.courses;
CREATE TABLE teachers SELECT * FROM course.teachers;
CREATE TABLE lessons SELECT * FROM course.lessons;

-- Процедура возвращает число записей в указанной таблице
DELIMITER |
DROP PROCEDURE IF EXISTS sp_table_records |
CREATE PROCEDURE sp_table_records (IN my_table VARCHAR(50))
BEGIN
	SELECT table_rows
		FROM information_schema.tables
		WHERE table_name = my_table
		  AND table_schema = 'module6';
END;
|
DELIMITER ;

-- Вызов процедуры
CALL sp_table_records('courses');



-- Процедура возвращает список таблиц и число записей в указанной БД
DELIMITER |
DROP PROCEDURE IF EXISTS sp_table_records_2 |
CREATE PROCEDURE sp_table_records_2 (IN dbName VARCHAR(50))
BEGIN
	SELECT table_name, table_rows
		FROM information_schema.tables
		WHERE table_schema = dbName;
END;
|
DELIMITER ;


-- Вызов процедуры
CALL sp_table_records_2('module6');





