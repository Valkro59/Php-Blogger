<?php // Attention à bien mettre la balise au tout début, s'il y a un espace, avec le output_buffering à Off dans le ini, une erreur est renvoyée

//config/app.php

//DIRECTORIES
define('ROOT_PATH',dirname(__DIR__));
define('LIB_PATH', ROOT_PATH . DS . 'library');
define('VIEWS_PATH', ROOT_PATH . DS . 'views');
define('CONF_PATH', ROOT_PATH . DS . 'config');

//DATABASE
define('DB_DSN', 'mysql:host=localhost;dbname=aston;charset=utf8'); //DSN = DATA SOURCE NAME
define('DB_USER', 'root');
define('DB_PASS', '');

// APP
define('APP_NAME', 'Aston');
define('THEME','default');
define('THEME_PATH', VIEWS_PATH . DS . THEME);
define('BASE_URL','/Php-Blogger');



