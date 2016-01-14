<?php
class Session
{
	public function __construct()
	{
		session_start();
	}
	public function set($name, $value)
	{
		$_SESSION[$name] = $value;
	}
	public function get($name)
	{
		if (isset($_SESSION[$name]))
		{
			return $_SESSION[$name];
		}
		else
		{
			return false;
		}
	}
	public function del($name)
	{
		unset($_SESSION[$name]);
	}
	public function destroy()
	{
		$_SESSION = array();
		session_destroy();
	}
}
?>