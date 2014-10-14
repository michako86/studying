USE world;

DELIMITER |
DROP TRIGGER IF EXISTS tg_country_delete |
CREATE TRIGGER tg_country_delete BEFORE DELETE ON country
FOR EACH ROW BEGIN
	DELETE FROM city WHERE CountryCode = OLD.code;
	DELETE FROM countrylanguage WHERE CountryCode = OLD.code;
END;
|
DELIMITER ;

SELECT code FROM country WHERE name = 'Albania';
SELECT * FROM city WHERE CountryCode = 'ALB';
SELECT * FROM countrylanguage WHERE CountryCode = 'ALB';

DELETE FROM country WHERE name = 'Albania';