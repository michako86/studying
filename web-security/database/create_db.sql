SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `ws` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- SHOW WARNINGS;
USE `ws`;

-- -----------------------------------------------------
-- Table `ws`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ws`.`user` ;

-- SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `ws`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор пользователя' ,
  `name` VARCHAR(45) BINARY NOT NULL DEFAULT 'Новый пользователь' COMMENT 'Имя пользователя' ,
  `email` VARCHAR(45) NOT NULL DEFAULT 'user@company.ru' COMMENT 'E-mail пользователя, используется в качестве логина' ,
  `password` VARCHAR(32) NOT NULL DEFAULT '' COMMENT 'Пароль пользователя' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `ixEmail` (`email` ASC) )
ENGINE = InnoDB
COMMENT = 'Таблица пользователей системы';

-- SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ws`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ws`.`role` ;

-- SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `ws`.`role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор роли' ,
  `title` VARCHAR(45) NOT NULL DEFAULT 'Новая роль' COMMENT 'Название роли' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Таблица ролей пользователей';

-- SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ws`.`user_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ws`.`user_role` ;

-- SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `ws`.`user_role` (
  `role_id` INT UNSIGNED NOT NULL ,
  `user_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`role_id`, `user_id`) ,
  INDEX `fk_role_has_user_role` (`role_id` ASC) ,
  INDEX `fk_role_has_user_user` (`user_id` ASC) ,
  CONSTRAINT `fk_role_has_user_role`
    FOREIGN KEY (`role_id` )
    REFERENCES `ws`.`role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_role_has_user_user`
    FOREIGN KEY (`user_id` )
    REFERENCES `ws`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ws`.`privilege`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ws`.`privilege` ;

-- SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `ws`.`privilege` (
  `code` VARCHAR(15) NOT NULL COMMENT 'Код разрешения' ,
  `title` VARCHAR(45) NOT NULL COMMENT 'Название разрешения' ,
  PRIMARY KEY (`code`) )
ENGINE = InnoDB
COMMENT = 'Таблица разрешений';

-- SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ws`.`role_privilege`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ws`.`role_privilege` ;

-- SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `ws`.`role_privilege` (
  `privilege_code` VARCHAR(15) NOT NULL ,
  `role_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`privilege_code`, `role_id`) ,
  INDEX `fk_privilege_has_role_privilege1` (`privilege_code` ASC) ,
  INDEX `fk_privilege_has_role_role1` (`role_id` ASC) ,
  CONSTRAINT `fk_privilege_has_role_privilege1`
    FOREIGN KEY (`privilege_code` )
    REFERENCES `ws`.`privilege` (`code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_privilege_has_role_role1`
    FOREIGN KEY (`role_id` )
    REFERENCES `ws`.`role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ws`.`gbook`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ws`.`gbook` ;

-- SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `ws`.`gbook` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Код записи' ,
  `date` DATETIME NOT NULL DEFAULT '1900-01-01' COMMENT 'Дата и время сообщения' ,
  `subject` VARCHAR(45) NOT NULL COMMENT 'Тема сообщения' ,
  `message` TEXT NOT NULL COMMENT 'Само сообщение' ,
  `user_id` INT UNSIGNED NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_gbook_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_gbook_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `ws`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Таблица с записями гостевой книги';

-- SHOW WARNINGS;


-- -----------------------------------------------------
-- Data for table `ws`.`user`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ws`;
INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES (1, 'Василий Пупкин', 'vasya@mail.ru', 'password');
INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES (2, 'Федор Сумкин', 'fedya@mail.ru', 'password');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ws`.`role`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ws`;
INSERT INTO `role` (`id`, `title`) VALUES (1, 'Анонимный пользователь');
INSERT INTO `role` (`id`, `title`) VALUES (2, 'Администратор');
INSERT INTO `role` (`id`, `title`) VALUES (3, 'Пользователь');
INSERT INTO `role` (`id`, `title`) VALUES (4, 'Продвинутый пользователь');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ws`.`user_role`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ws`;
INSERT INTO `user_role` (`role_id`, `user_id`) VALUES (3, 1);
INSERT INTO `user_role` (`role_id`, `user_id`) VALUES (2, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `ws`.`privilege`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ws`;
INSERT INTO `privilege` (`code`, `title`) VALUES ('GBOOK_INSERT', 'Добавление в гостевую книгу');
INSERT INTO `privilege` (`code`, `title`) VALUES ('GBOOK_DELETE', 'Удаление из гоствекой книги');
INSERT INTO `privilege` (`code`, `title`) VALUES ('GBOOK_UPDATE', 'Изменение гостевой книги');
INSERT INTO `privilege` (`code`, `title`) VALUES ('GBOOK_SELECT', 'Доступ к данных гостевой книги');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ws`.`role_privilege`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ws`;
INSERT INTO `role_privilege` (`privilege_code`, `role_id`) VALUES ('GBOOK_SELECT', 2);
INSERT INTO `role_privilege` (`privilege_code`, `role_id`) VALUES ('GBOOK_SELECT', 3);
INSERT INTO `role_privilege` (`privilege_code`, `role_id`) VALUES ('GBOOK_INSERT', 2);
INSERT INTO `role_privilege` (`privilege_code`, `role_id`) VALUES ('GBOOK_INSERT', 3);
INSERT INTO `role_privilege` (`privilege_code`, `role_id`) VALUES ('GBOOK_UPDATE', 2);
INSERT INTO `role_privilege` (`privilege_code`, `role_id`) VALUES ('GBOOK_DELETE', 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `ws`.`gbook`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `ws`;
INSERT INTO `gbook` (`id`, `date`, `subject`, `message`, `user_id`) VALUES (1, '2009-01-01', 'С НОВЫМ ГОДОМ', 'Поздравляю с Новым Годом', 1);

COMMIT;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
