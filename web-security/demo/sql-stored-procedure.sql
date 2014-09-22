-- Хранимая процедура для вывода списка сообщений
DELIMITER |
DROP PROCEDURE IF EXISTS spDemoSQLInjenction5 |
CREATE PROCEDURE spDemoSQLInjenction5 (userId INT)
BEGIN
	SELECT id, date, subject, message 
		FROM gbook 
		WHERE user_id = userId;
END
|
DELIMITER ;

-- Вызов хранимой процедуры
CALL spDemoSQLInjenction5(1);