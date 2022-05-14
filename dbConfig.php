<?php
class Db_Config 
{	
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'scandiweb_task';
	
	protected $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
			//Checking if mysql connection made or not
			if (!$this->connection) {
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->connection;
        echo "successfull";
	}
}
?>