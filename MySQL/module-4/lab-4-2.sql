-- —редн€€ продолжительность жизни по региону
SELECT region, AVG(LifeExpectancy)
	FROM world.country
	GROUP BY region
	ORDER BY 2 DESC;
	
	
-- —редн€€ продолжительность жизни по региону и контитенту
SELECT continent, region, AVG(LifeExpectancy)
	FROM world.country
	GROUP BY continent, region WITH ROLLUP;	
	
	