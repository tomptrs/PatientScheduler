<?php

require "db.php";

class Patient
{
	private $db;
	
	function __construct()
	{
		
		$this->db = new Databank();
	}
	
	
	function ZoekPatientOpUserName($username)
	{
		$sql = "select * from patient where username like '%{$username}%'";
		$this->db->query($sql);
		$jsonA = array();
			while($row = $this->db->result->fetch_assoc()){
   
   				$jsonA[] =$row;
			}
		return json_encode($jsonA);
	}

	
	function VoegToe($username,$pwd)
	{
		$sql = "insert into patient(Id, Username,Password) VALUES (null, '$username','$pwd')";		
		$this->db->query($sql);
	}
	//Send Json
	function GetAllPatients()
	{
		

$sql = <<<SQL
    SELECT *
    FROM patient
     
SQL;

$this->db->query($sql);
$jsonA = array();
while($row = $this->db->result->fetch_assoc()){
   // echo $row['Username'] . '<br />';
   $jsonA[] =$row;
}
return json_encode($jsonA);
		/*try
		{
			$jsonA = array();
			$this->db->query($q);
			while($line = $this->db->fetchArray())
			{
				// $jsonA[] = $line;
				 $jsonA['Patients'][] = array('id'=>$line[0], 'username'=>$line[1], 'password'=>$line[2]);
				//$json['Orders'][] = array('DeliveryId' => $row[0], 'CustomerName' => $row[1], ...);

			}
			return json_encode($jsonA);
		}
		catch(Exception $e)
		{
			return "error getAllPatients";
		}*/
			
	}
}

?>