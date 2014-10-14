@ECHO off

ECHO ==== MySQL 5 Course sample databases ====

SET USER=root
SET PWD=password

REM Dropping all databases
mysql -u%USER% -p%PWD% -e "DROP DATABASE IF EXISTS course"
mysql -u%USER% -p%PWD% -e "DROP DATABASE IF EXISTS world"
mysql -u%USER% -p%PWD% -e "DROP DATABASE IF EXISTS test"

REM Create all databases
mysql -u%USER% -p%PWD% -e "CREATE DATABASE course"
mysql -u%USER% -p%PWD% -e "CREATE DATABASE world"
mysql -u%USER% -p%PWD% -e "CREATE DATABASE test"

REM Load data to all databases
ECHO Loading DB course...
mysql -u%USER% -p%PWD% course < course_db\course_db.sql
ECHO Loading DB world...
mysql -u%USER% -p%PWD% world < world\world.sql

ECHO Databases created


