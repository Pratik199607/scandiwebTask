<?php
class Db_Config 
{	
	private $host = 'localhost';
	private $username = 'id18937635_root1';
	private $password = 'Hello_bhai_kya_scene_hai@2022';
	private $database = 'id18937635_scandiweb_task';
	
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