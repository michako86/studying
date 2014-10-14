-- Создание базы данных
USE module4;
	
SELECT name, phone
	FROM teachers
	ORDER BY name;		

SELECT name, phone
	FROM teachers
	ORDER BY 2;	
	
SELECT name, phone
	FROM teachers
	ORDER BY RAND();
	
SELECT name, phone
	FROM teachers
	ORDER BY name
	LIMIT 3;
	
SELECT name, phone
	FROM teachers
	ORDER BY name
	LIMIT 3, 1;	
	
SELECT * 
	FROM teachers
	ORDER BY id DESC
	LIMIT 1;
	
	
	