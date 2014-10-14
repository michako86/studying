-- Создание базы данных
CREATE DATABASE IF NOT EXISTS module5;
USE module5;

-- Копия таблиц для демонстрации
CREATE TABLE courses SELECT * FROM course.courses;
CREATE TABLE teachers SELECT * FROM course.teachers;
CREATE TABLE lessons SELECT * FROM course.lessons;
-- --------------------------------------------------------------
(
	-- Какие аудитории использовались 30 сентября
	SELECT room, lesson_date AS `date`
		FROM lessons 
		WHERE lesson_date = '2006-09-30'
)
UNION ALL
(
	-- Когда и где читался курс PHP
	SELECT room, lesson_date 
		FROM lessons
			INNER JOIN courses ON lessons.course = courses.id
		WHERE courses.title LIKE '%php%'
)
UNION DISTINCT
(
	SELECT 'Новый класс', NULL
)
ORDER BY 2
\g	
----------------------------------------------------------------
(
	-- Какие аудитории использовались 30 сентября
	SELECT room, lesson_date 
		FROM lessons 
		WHERE lesson_date = '2006-09-30'
)
UNION  
(
	-- Когда и где читался курс PHP
	SELECT room, lesson_date 
		FROM lessons
			INNER JOIN courses ON lessons.course = courses.id
		WHERE courses.title LIKE '%php%'
)
UNION 
(
	SELECT 'Новый класс', NULL
)
ORDER BY 2
\g	
----------------------------------------------------------------	







