-- Создание базы данных
CREATE DATABASE IF NOT EXISTS module8;
USE module8;

-- Копия таблиц для демонстрации
CREATE TABLE courses SELECT * FROM course.courses;
CREATE TABLE teachers SELECT * FROM course.teachers;
CREATE TABLE lessons SELECT * FROM course.lessons;

CREATE TABLE city_bad ENGINE=MyISAM SELECT * FROM world.city;

REPAIR TABLE city1;