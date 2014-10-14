@echo off

:: Вызовем хранимую процедуру и вывод в XML
mysql -uroot -ppassword -e "CALL module6.sp_table_records_2('module6')" -X