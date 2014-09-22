USE `ws`;

-- -----------------------------------------------------
-- Table `ws`.`user`
-- -----------------------------------------------------
-- SHOW WARNINGS;

ALTER TABLE user
	ADD COLUMN salt VARCHAR(50) NOT NULL DEFAULT '' COMMENT 'Соль, используемая при хешировании',
	ADD COLUMN iteration INT NOT NULL DEFAULT 100 COMMENT 'Число итерация хеширования';
	
-- -----------------------------------------------------
-- Data for table `ws`.`user`. Все пароли password
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
UPDATE user SET password = '045f8b26111aa14cfa118e764b71207a', salt = 'ZDgzMTZiMGJhYzI4ZWYyN2RlMjhhYTYwZTg3ZTY3MTk', iteration = 100 WHERE id = 1;
UPDATE user SET password = '097e14a16b68d2ea6b614bcc9ec070da', salt = 'MzRjZGJmYzlkNmQ3OTYxZWIxNWZmZjZmNjVhMjQ3MDQ', iteration = 100 WHERE id = 2;
COMMIT;