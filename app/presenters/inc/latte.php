<?php
define('LA_DIR', str_replace('\\', '/', getcwd()).'/latte/src/');
require_once(LA_DIR . 'latte.php');

$latte = new Latte\Engine;
$parameters['items']= array('one', 'two', 'three');
$latte->render(DIR_VIEW . 'template.latte', $parameters);

