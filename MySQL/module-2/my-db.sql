SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `teachers_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `teachers_db` ;

-- -----------------------------------------------------
-- Table `teachers_db`.`teacher`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachers_db`.`teacher` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `addr` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'ТАблица преподов';


-- -----------------------------------------------------
-- Table `teachers_db`.`course`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachers_db`.`course` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NOT NULL ,
  `descrption` TEXT NULL ,
  `length` TINYINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Таблица курсов';


-- -----------------------------------------------------
-- Table `teachers_db`.`lesson`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `teachers_db`.`lesson` (
  `room` CHAR(5) NOT NULL ,
  `date` DATETIME NOT NULL ,
  `length` TINYINT UNSIGNED NOT NULL ,
  `teacher_id` INT UNSIGNED NOT NULL ,
  `course_id` INT UNSIGNED NOT NULL ,
  INDEX `fk_lesson_teacher` (`teacher_id` ASC) ,
  INDEX `fk_lesson_course1` (`course_id` ASC) ,
  PRIMARY KEY (`teacher_id`, `course_id`, `date`) ,
  CONSTRAINT `fk_lesson_teacher`
    FOREIGN KEY (`teacher_id` )
    REFERENCES `teachers_db`.`teacher` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lesson_course1`
    FOREIGN KEY (`course_id` )
    REFERENCES `teachers_db`.`course` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Таблица занятий';



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
