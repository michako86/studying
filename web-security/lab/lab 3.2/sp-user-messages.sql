-- Хранимая процедура для вывода списка сообщений пользователей
DELIMITER |
DROP PROCEDURE IF EXISTS spUserMessages |
CREATE PROCEDURE spUserMessages (userId INT)
BEGIN
	SELECT id, DATE_FORMAT(date, '%d.%m.%Y %H:%i') AS date, subject, message 
		FROM gbook 
		WHERE user_id = userId;
END
|
DELIMITER ;

-- Вызов хранимой процедуры
CALL spUserMessages(1);