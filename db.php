<?php

class Databank
{
	public $result;
	private $db;
	public function __construct()
	{		
		//mysqli_connect("localhost","root","");
		//mysqli_connect("localhost","root", "", "visitapatient");
		$this->db = new mysqli('localhost', 'root', '', 'visitapatient');

		if($this->db->connect_errno > 0){
    		die('Unable to connect to database [' . $db->connect_error . ']');
		}
		//mysqli_select_db("visitapatient");
		//mysqli_connect($host, $user, $password, $database, $port, $socket)
	}
	
	public function query($str)
	{
		//$this->query = mysql_query($str);
		if(!$this->result = $this->db->query($str)){
    		die('There was an error running the query [' . $this->db->error . ']');
			}
		
	}
	
	public function fetchAssoc()
	{
		return mysqli_fetch_assoc($this->result);	
	}
	
	public function fetchArray()
	{
			
		return mysqli_fetch_array($this->query);
	}
}


?>