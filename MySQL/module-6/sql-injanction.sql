/*

Логин: admin 
Пароль: ' OR 1=1; --

*/

SELECT id FROM users WHERE login = '$login' AND pwd = '$pwd';

SELECT id FROM users WHERE login = 'admin'; --' AND pwd = '$pwd';

SELECT id FROM users WHERE login = 'admin' AND pwd = '' OR 1=1; --';

SELECT id FROM users WHERE login = ? AND pwd = ?;