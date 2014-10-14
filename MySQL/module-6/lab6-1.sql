/* Задание 

Написать хранимую процедуру, которая получит название страны
и вернет как результат таблицу

+-------------+-------+
| Parameter   | Value |
+-------------+-------+
| Name        | Russia|
| Popultation |1200000|
| Capital     |Moscow |
+-------------+-------+

*/

DELIMITER |
DROP PROCEDURE IF EXISTS sp_lab_6_1 |
CREATE PROCEDURE sp_lab_6_1 (IN country_code CHAR(3))
BEGIN
	-- Создадим временную таблицу результата
	CREATE TEMPORARY TABLE `result`
	(
		`parameter` VARCHAR(50), 
		`value`	VARCHAR(50)
	);
	
	-- Впишем во временную таблицу название страны
	INSERT INTO `result` (`parameter`, `value`)
		SELECT 'Name', name
			FROM world.country
			WHERE code = country_code;
	
	-- Впишем во временную таблицу население страны
	INSERT INTO `result` (`parameter`, `value`)
		SELECT 'Population', population
			FROM world.country
			WHERE code = country_code;

	-- Впишем во временную таблицу столицу страны
	INSERT INTO `result` (`parameter`, `value`)
		SELECT 'Capital', city.name
			FROM world.country
				INNER JOIN world.city ON country.capital = city.id
			WHERE country.code = country_code;			
			
	
	-- Вернем временную таблицу
	SELECT * FROM `result`;
	
	-- Удалим временную таблицу
	DROP TEMPORARY TABLE `result`;
	
END;
|
DELIMITER ;

-- Информация о России
CALL sp_lab_6_1('RUS');







	