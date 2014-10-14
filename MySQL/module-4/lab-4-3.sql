-- В каких странах мира используется французский язык
SELECT country.name, countrylanguage.language
	FROM world.country INNER JOIN world.countrylanguage
		ON country.code = countrylanguage.countrycode
	WHERE countrylanguage.language LIKE 'fr%';
	