-- Список стран, в которых есть города миллионники
SELECT DISTINCT country.Name
    FROM world.country 
		INNER JOIN world.city ON country.Code = city.CountryCode
    WHERE city.Population >= 1000000

