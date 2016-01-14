<?php 
require_once('../include/lib/session.class.php');
require_once('../include/lib/login.class.php');
require_once('../include/lib/pdo.class.php');
require_once('include/language.thai.php');
$default = new Session();
header("Content-Type: text/html; charset=".$default->get('charset')."");
?>
