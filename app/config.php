<?php

define('SYSTEM_PATH', dirname(__FILE__)); // location of 'app' folder - don't change
set_include_path(SYSTEM_PATH); // include path - don't change

//define('BASE_URL','http://localhost/Calcyoulater');
define('BASE_URL','http://'.$_SERVER["SERVER_NAME"].'/calcsdotcom');

define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','');
define('DB_DATABASE','calcsdotcom');
define('NAVBAR',SYSTEM_PATH . '/view/headers/navbar.tpl');