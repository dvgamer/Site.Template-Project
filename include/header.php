<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<?php 
require_once('include/lib/session.class.php');
require_once('include/lib/pdo.class.php');
require_once('include/lib/readdir.class.php');
require_once('include/language.thai.php');
$default = new Session();
header("Content-Type: text/html; charset=".$default->get('charset')."");
?>