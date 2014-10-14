-- Список стран в которых нет городов миллиоников
SELECT country.Name
    FROM world.country
    WHERE country.Code NOT IN
(
    -- Список кодов стран с городами миллиониками
    SELECT city.CountryCode
        FROM world.city
        WHERE city.Population >= 1000000
)