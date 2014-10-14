CREATE DATABASE module8;
USE module8;

-- InnoDB
CREATE TABLE city0 ENGINE=InnoDB SELECT * FROM world.city;

-- Пример тормозного запроса	(14.38 sec)
SELECT COUNT(*) 
	FROM city0 c1 
	WHERE EXISTS (SELECT * FROM city0 c2 WHERE c2.Name = c1.Name);
	
EXPLAIN	
SELECT COUNT(*) 
	FROM city0 c1 
	WHERE EXISTS (SELECT * FROM city0 c2 WHERE c1.name = c2.name)
\G	

CREATE TABLE city1 ENGINE=InnoDB SELECT * FROM world.city;
CREATE INDEX ixName ON city1 (name);

-- Пример тормозного запроса	(0.06 sec)
SELECT COUNT(*) 
	FROM city1 c1 
	WHERE EXISTS (SELECT * FROM city1 c2 WHERE c1.name = c2.name);
	
SELECT COUNT(*) 
	FROM city1 c1 
	WHERE EXISTS (SELECT * FROM city1 c2 WHERE c1.name = c2.name);	
	
EXPLAIN		
SELECT COUNT(*) 
	FROM city1 c1 
	WHERE EXISTS (SELECT * FROM city1 c2 WHERE  c2.name = c1.name)
\G	
	
	

CREATE TABLE city2 ENGINE=MyISAM SELECT * FROM world.city;	
CREATE INDEX ixID ON city2 (ID);	
CREATE INDEX ixName ON city2 (name);	
CREATE INDEX ixCountryCode ON city2 (CountryCode);	
CREATE INDEX ixDistrict ON city2 (District);	
CREATE INDEX ixPopulation ON city2 (Population);	
	
EXPLAIN		
SELECT COUNT(*) 
	FROM city2 c1 
	WHERE EXISTS (SELECT * FROM city2 c2 WHERE c1.name = c2.name)
\G	
	
	
explain	
SELECT name 
	FROM city0
	WHERE name LIKE 'm%';
	
	
	
	
	