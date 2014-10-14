-- Создание базы данных
CREATE DATABASE IF NOT EXISTS module6;
USE module6;

-- Таблица продуктов
DROP TABLE IF EXISTS product;
CREATE TABLE product
(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	title VARCHAR(30) NOT NULL DEFAULT '',
	price FLOAT NOT NULL DEFAULT 0,
	quo FLOAT NOT NULL DEFAULT 0,
	PRIMARY KEY (id)
);

-- Данные таблицы
INSERT INTO product 
	VALUES
		(1, 'Товар 1', 123, 200),
		(2, 'Товар 2', 150, 200),
		(3, 'Товар 3', 187, 300),
		(4, 'Товар 4', 300, 400),
		(5, 'Товар 5', 225, 500);

-- Тaблица журнала операций
DROP TABLE IF EXISTS product_log;
CREATE TABLE product_log
(
	date DATETIME COMMENT 'Дата и время операции',
	user VARCHAR(50) COMMENT 'Кто сделал изменения',
	product_id INT UNSIGNED COMMENT 'Код продукта',
	old_price FLOAT COMMENT 'Старая цена',
	new_price FLOAT COMMENT 'Новая цена'
);





DELIMITER |
DROP TRIGGER IF EXISTS tg_product_update |
CREATE TRIGGER tg_product_update AFTER UPDATE ON product
FOR EACH ROW BEGIN
	-- Если цена изменялась...
	IF OLD.price <> NEW.price THEN
		-- Внесем запись в журнал
		INSERT INTO product_log
			VALUES (NOW(), USER(), OLD.id, OLD.price, NEW.price);
	END IF;
END;
|
DELIMITER ;




-- Меняем цены
UPDATE product SET price = price / 2 WHERE id = 2;

DELIMITER |
DROP TRIGGER IF EXISTS tg_product_insert |
CREATE TRIGGER tg_product_insert AFTER INSERT ON product
FOR EACH ROW BEGIN
	-- Внесем запись в журнал
	INSERT INTO product_log
		VALUES (NOW(), USER(), NEW.id, NULL, NEW.price);
END;
|

DROP TRIGGER IF EXISTS tg_product_delete |
CREATE TRIGGER tg_product_delete BEFORE DELETE ON product
FOR EACH ROW BEGIN
	-- Внесем запись в журнал
	INSERT INTO product_log
		VALUES (NOW(), USER(), OLD.id, OLD.price, NULL);
END;
|
DELIMITER ;

-- Производим разные изменения
UPDATE product SET price = price * 1.2;
DELETE FROM product ORDER BY id DESC LIMIT 1;
INSERT INTO product VALUES (10, 'Новый товар', 123, 200);

-- Смотрим журнал изменения цен
SELECT * FROM product_log;
