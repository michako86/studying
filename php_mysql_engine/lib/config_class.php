<?php

abstract class Config {

	const SITENAME = "MyRusakov.ru";
	const SECRET = "DGLJDG5";
	const ADDRESS = "http://mysite.local";
	const ADM_NAME = "Михаил Русаков";
	const ADM_EMAIL = "admin@myrusakov.ru";
	
	const API_KEY = "DKEL39DL";
	
	const DB_HOST = "localhost";
	const DB_USER = "root";
	const DB_PASSWORD = "90148";
	const DB_NAME = "phpsite";
	const DB_PREFIX = "xyz_";
	const DB_SYM_QUERY = "?";
	
	const DIR_IMG = "/images/";
	const DIR_IMG_ARTICLES = "/images/articles/";
	const DIR_AVATAR = "/images/avatars/";
	const DIR_TMPL = "C:/Users/Public/WebServer/apache/htdocs/php-site/tmpl/";
	const DIR_EMAILS = "C:/Users/Public/WebServer/apache/htdocs/php-site/tmpl/emails/";
	
	const LAYOUT = "main";
        //C:\Users\Public\WebServer\apache\htdocs\php-site
	const FILE_MESSAGES = "C:/Users/Public/WebServer/apache/htdocs/php-site/text/messages.ini";
	
	const FORMAT_DATE = "%d.%m.%Y %H:%M:%S";
	
	const COUNT_ARTICLES_ON_PAGE = 3;
	const COUNT_SHOW_PAGES = 10;
	
	const MIN_SEARCH_LEN = 3;
	const LEN_SEARCH_RES = 255;
	
	const SEF_SUFFIX = ".html";
	
	const DEFAULT_AVATAR = "default.png";
	const MAX_SIZE_AVATAR = 51200;
}

?>