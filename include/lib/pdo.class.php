<?php
class PDOConnection
{
	protected $pdoConnection;
	protected $dsnConfig = array();
	protected $connection;
	
	public function __construct()
	{
		$this->connection = new Session();		
		$this->dsnConfig = array (
								 'dsn' => 'mysql:host='.$this->connection->get('localhost').';dbname='.$this->connection->get('dbname').';',
								 'user' => $this->connection->get('username'),
								 'pass' => $this->connection->get('password')
								 );		
	}
	
	public function connect()
	{
		try	{
			$this->pdoConnection = new PDO($this->dsnConfig['dsn'], $this->dsnConfig['user'], $this->dsnConfig['pass']);
			$this->pdoConnection->query("SET NAMES 'TIS620'");
			$this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			$this->getError($e);			
		}
	}
	
	public function select($table)
	{
		$sql = 'Select * from '.$table.'';
		return $this->pdoConnection->query($sql);
	}
	
	public function count_table($table)
	{
		try {
			$sql = 'Select COUNT(*) from '.$table.'';
			$statement =  $this->pdoConnection->prepare($sql);
			$statement->execute();
			return $statement->fetchColumn();
		} catch (PDOException $e) {
			return false;
		}
	}		

	protected function getError($Exception)
	{
		echo '<div id="error">'.$Exception->getMessage().'</div>';
	}
}

?>