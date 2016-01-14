<?php
include_once('include/header.php');
$default = new Session();
if (!isset($_SESSION['localhost'])) {
	foreach (parse_ini_file('include/config.ini', true) as $config) {
		foreach ($config as $key => $value) { $default->set($key,$value); }
	}
}

include('template/defualt/index.php'); 
?>
