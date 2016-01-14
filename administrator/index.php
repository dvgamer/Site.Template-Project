<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include_once('include/header.php');
$default = new Session();
if (!isset($_SESSION['localhost'])) {
	foreach (parse_ini_file('include/config.ini', true) as $config) {
		foreach ($config as $key => $value) { $default->set($key,$value); }
	}
}
?>
<title>Administrator :: <?php echo $default->get('title'); ?></title>
<link rel="stylesheet" type="text/css" href="../include/style_css.css">
<link rel="stylesheet" type="text/css" href="include/admin_css.css">

<script language="javascript" src="../include/function.script.js"></script>
</head>
<body>
<center>
<div id="admin-head">
<img src="images/admin_ico.png" hspace="10" vspace="2" border="0" align="left">
<h1>Administrator</h1>
<strong><?php echo $default->get('title'); ?></strong>
</div>
<?php 
$admin = new PDOConnection();
$admin->connect();

if (isset($_POST['submit'])) {
	$login = new Login();
	if ($_POST['username']!=_ADMIN_USERNAME || $_POST['password']!=_ADMIN_PASSWORD) {
		$login->adminCheack($_POST['username'], $_POST['password']);		
	} else {
		echo '<div id="error">'._ADMIN_ERROR_1.'</div>';
	}
}
?>
<?php if (!$default->get('DVGID')) { ?>
<div id="admin-login">
<h5><?php echo _ADMIN_HEAD; ?></h5>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="top">
	<div id="admin-icon" align="center"><img src="images/lock.jpg" hspace="5" vspace="5" ></div>
    <div id="admin-text">
	<?php echo _ADMIN_COMMENT; ?><br>
    <a href="#"><?php echo _ADMIN_BACK; ?></a>
    </div>
    </td>
    <td width="50%"><div id="admin-from">
    <form name="admin-login" method="post" action="<?php $PHP_SELF; ?>">
      <input name="username" type="text" id="username" value="<?php echo _ADMIN_USERNAME;?>" size="25" maxlength="20" onFocus="loginValue(this, '<?php echo _ADMIN_USERNAME;?>')">
      <input name="password" type="password" id="password" value="<?php echo _ADMIN_PASSWORD;?>" size="25" maxlength="20" onFocus="loginValue(this, '<?php echo _ADMIN_PASSWORD;?>')">
      <br><input name="submit" type="submit" id="submit" value="<?php echo _ADMIN_LOGIN; ?>">
    </form>
    </div></td>
  </tr>
</table>
</div>
<?php } else { 
echo '<div id="admin-menu">';
$default = new Session();
	foreach ($admin->select($default->get('dbtable').'module_menu WHERE section_id=1 ORDER BY orderlist ASC') as $menu) {
		echo '<li><a href="'.$menu['ref'].'">'.$menu['menu'].'</a></li>';
	}
echo '</div>';
	if (isset($_GET['option'])) {
		include('component\\'.$_GET['option'].'\\'.$_GET['option'].'.php');
	} else {
		
	}
} ?>

</center>
</body>
</html>