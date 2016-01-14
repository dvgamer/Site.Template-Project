<?php  if(isset($_POST['ok'])) {
	$option = new Login();
	$option->logout();
	header('Location: '.$_SERVER['PHP_SELF'].'');
} elseif(isset($_POST['cancel'])) {
	header('Location: '.$_SERVER['PHP_SELF'].'');	
} else { ?>
<div id="admin-login">
<h5><?php echo _ADMIN_QUIZ_LOGOUT; ?></h5>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="top" align="center"><br>
    <div id="admin-icon" align="center"><img src="images/lock.jpg" hspace="5" vspace="5" ></div>
    </td>
    <td width="50%" align="center"><div id="admin-from">
    <form name="admin-login" method="post" action="<?php $PHP_SELF; ?>">
    <input name="ok" type="submit" id="submit" value="<?php echo _ADMIN_OK; ?>">
    <input name="cancel" type="submit" id="submit" value="<?php echo _ADMIN_CANCEL; ?>">
    </form>
    </div></td>
  </tr>
</table>
</div>
<?php } ?>
