<?php
define('DB_NAME', 'Library');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

define('DIR_BASE', __ROOT__ . '/');
define('DIR_MODEL', DIR_BASE.'models/');
define('DIR_CTRL', DIR_BASE.'controllers/');
define('DIR_VIEW', DIR_BASE.'templates/');

define('DEFAULT_CTRL', 'Book');
define('DEFAULT_ACTION', 'Index');

define('DEFAULT_LAYOUT', 'layout.latte');
define('CONTENT_TPL_VAR', 'content_tpl');

define('DIR_DB_SCR', DIR_BASE . 'SQL/dbScript/');
define('LA_DIR', str_replace('\\', '/', getcwd()).'/latte/src/');
define('DIR_CSS', '/' . 'cssAndScript/styleSheet/');
define('DIR_JS', '/' . 'cssAndScript/javaScript/');

?>