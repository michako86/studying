-- Пример ВЫРАЖЕНИЯ case

SELECT teacher, 
		CASE
			WHEN course = 1 THEN -10
			WHEN course = 2 THEN -20
			ELSE course
		END
	FROM lessons;
	
	