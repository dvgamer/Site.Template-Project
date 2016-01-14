<?php
class Login
{
	protected $user;
	protected $regis;
	protected $table;
	
	public function __construct()
	{
		$this->regis = new Session();
		$this->user = new PDOConnection();
		$this->user->connect();
		$this->table = $this->regis->get('dbtable').'user';
	}
	
	public function adminCheack($username, $password)
	{
		$sql = $this->table.' WHERE username="'.trim($username).'"';
		if ($this->user->count_table($sql))
		{
			// echo ' Found.<br>';
			foreach ($this->user->select($sql) as $admin)
			{
				if ($admin['type_id']==4)
				{
					if (trim($password) == $admin['password']) 
					{
						$this->login($admin['user_id'], $username);
					} else {
						echo '<div id="error">'._ADMIN_ERROR_3.'</div>';
					}
				} else {
					echo '<div id="error">'._ADMIN_ERROR_4.'</div>';
					// echo ' Found, But is'.$admin['type_id'].'.<br>';	
				}
			}
		} else {
			echo '<div id="error">'._ADMIN_ERROR_2.'</div>';
		}		
	}
	
	private function login($user_id, $username)
	{
		$this->regis->set('USERNAME', $user_id);
		$this->regis->set('DVGID', $username);
	}
	
	public function logout()
	{
		$this->regis->del('USERNAME');
		$this->regis->del('DVGID');
	}
}
?>