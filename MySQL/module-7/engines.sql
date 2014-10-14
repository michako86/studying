-- Создание базы данных
CREATE DATABASE IF NOT EXISTS module7;
USE module7;

-- InnoDB
CREATE TABLE city0 ENGINE=InnoDB  SELECT * FROM world.city;
ALTER TABLE city0 ENGINE=InnoDB;
-- Пример тормозного запроса	(10.17 sec)
SELECT COUNT(*) 
	FROM city0 c1 
	WHERE EXISTS (SELECT * FROM city0 c2 WHERE c1.name = c2.name);


-- MyISAM
CREATE TABLE city1 ENGINE=MyISAM SELECT * FROM world.city;
-- Пример тормозного запроса	(22.97 sec)
SELECT COUNT(*) 
	FROM city1 c1 
	WHERE EXISTS (SELECT * FROM city1 c2 WHERE c1.name = c2.name);

-- Archive
CREATE TABLE city2 ENGINE=ARCHIVE SELECT * FROM world.city;
-- Пример тормозного запроса (12.23 sec)
SELECT COUNT(*) 
	FROM city2 c1 
	WHERE EXISTS (SELECT * FROM city2 c2 WHERE c1.name = c2.name);

	
	
--  BLACKHOLE ???
CREATE TABLE city10 ENGINE=BLACKHOLE SELECT * FROM world.city;	
SELECT name 
	FROM city10 c1 
	WHERE EXISTS (SELECT * FROM city10 c2 WHERE c1.name = c2.name);	
	

-- CSV
CREATE TABLE city3 ENGINE=CSV SELECT * FROM world.city;
-- Пример тормозного запроса	(14.05 sec)
SELECT COUNT(*) 
	FROM city3 c1 
	WHERE EXISTS (SELECT * FROM city3 c2 WHERE c1.name = c2.name);


-- Memory
CREATE TABLE city4 ENGINE=MEMORY SELECT * FROM world.city;

-- Пример тормозного запроса	(2.00 sec)
SELECT COUNT(*) 
	FROM city4 c1 
	WHERE EXISTS (SELECT * FROM city4 c2 WHERE c1.name = c2.name);

	
--  BLACKHOLE ???
CREATE TABLE city10 ENGINE=BLACKHOLE SELECT * FROM world.city;	
SELECT name 
	FROM city10 c1 
	WHERE EXISTS (SELECT * FROM city10 c2 WHERE c1.name = c2.name);	
	
	