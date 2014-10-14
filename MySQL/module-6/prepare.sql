-- Создание базы данных
CREATE DATABASE IF NOT EXISTS module6;
USE module6;

-- Копия таблиц для демонстрации
CREATE TABLE courses SELECT * FROM course.courses;
CREATE TABLE teachers SELECT * FROM course.teachers;
CREATE TABLE lessons SELECT * FROM course.lessons;

-- Пример запроса: в какие даты были занятия у указанного преподавателя
SELECT lesson_date
	FROM lessons
	WHERE teacher = 1;

-- Подготовка оператора к исполнению
PREPARE sql_lesson_dates FROM
	'SELECT lesson_date FROM lessons WHERE teacher = ?';

-- Подготовка параметра
SET @teacher = 1;

-- Выполнение запроса
EXECUTE sql_lesson_dates USING @teacher;

-- Подготовка параметра
SET @teacher = 2;

-- Выполнение запроса
EXECUTE sql_lesson_dates USING @teacher;

-- Освобождение запроса
DROP PREPARE sql_lesson_dates;








-- ПРимер 2

-- Узнать число записей в таблице xxx
DELIMITER |
DROP PROCEDURE IF EXISTS sp_table_records_3 |
CREATE PROCEDURE sp_table_records_3 (IN tableName VARCHAR(50))
BEGIN
	SET @mySQlQuery = CONCAT('SELECT COUNT(*) FROM ', tableName);
	PREPARE sqlMySQlQuery FROM @mySQlQuery;
	EXECUTE sqlMySQlQuery;
	DROP PREPARE sqlMySQlQuery;
END;
|
DELIMITER ;

CALL sp_table_records_3('courses');





