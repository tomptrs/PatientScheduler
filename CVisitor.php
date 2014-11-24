<?php

require "db.php";

class Visitor
{
	private $db;
	private $result;
	
	function __construct()
	{
		
		$this->db = new Databank();
	}
	
	
	function VoegVisitorToe($username,$pwd)
	{
		$sql = "insert into visitor(Id, Username,Password) VALUES (null, '$username','$pwd')";		
		$this->db->query($sql);
	}
	
	function MakeAVisit($userId,$patientId,$datum,$startuur,$einduur,$fn,$ln)
	{
	
		$sql = "insert into visitpatient(PatientId,VisitorId, Datum,StartHour,EndHour,FirstName,LastName) VALUES ('$patientId','$userId','$datum','$startuur', '$einduur','$fn','$ln')";		
		$this->db->query($sql);
	}
	
	//For next 14 days
	function GetVisitorsFromPatient($patientId)
	{
		$sql = <<<SQL
    		SELECT p.username,p.password, vp.Datum, vp.StartHour, vp.EndHour,vp.confirm, vp.FirstName, vp.LastName
    		FROM patient p,visitpatient vp
    		where p.Id = vp.PatientId    		
    		and vp.Datum >= curdate() 
SQL;

		$this->db->query($sql);
		$jsonA = array();
		while($row = $this->db->result->fetch_assoc()){
   
   			$jsonA[] =$row;
		}
		
		$d = date("Y/m/d");
		$jsonB = array();

//make calendar array for next 14 days!!
		for($i =0 ;  $i < 14; $i++)
		{
			$inCal = false;
			$tmp = "+$i days";
			$da = date('Y-m-d', strtotime($tmp));
			$counter=array();
			$tel=0;
			for($j=0;$j<count($jsonA);$j++)
			{				
				if ($jsonA[$j]["Datum"] == $da)
				{
					$inCal = true;
					$counter[$tel] = $j;
					$tel++;
				}
			}
			
			if($inCal)
			{
				//print "TRUE";
				/*
				 *  [Username] => arno
    [Password] => arno
    [username] => tom
    [password] => tom
    [Datum] => 2014-11-25
    [StartHour] => 17
    [EndHour] => 19
				 * */
				// print $j;
				for($k=0;$k<count($counter);$k++)
					$jsonB[] = $jsonA[$counter[$k]];//array('Username'=>$jsonA[$j].Username,'Password'=>$jsonA[$j].Password,'username'=>$jsonA[$j].username,'password'=>$jsonA[$j].password,'Datum'=>$jsonA[$j].Datum,'StartHour'=>$jsonA[$j].StartHour,'EndHour'=>$jsonA[$j].EndHour);
			}
			else {
				$jsonB[] = array('Username'=>"no visit planned",'Password'=>"",'username'=>"no visit planned",'password'=>"no",'Datum'=>$da,'StartHour'=>0,'EndHour'=>0, 'confirm'=>0, 'FirstName'=>'','LastName'=>'');
			}
			
		}
		
		//print_r($jsonB);
		
		//return json_encode($jsonA);
		return json_encode($jsonB);
	}
	
	function test($data, $d)
	{
		for($i =0 ;  $i < 14; $i++)
		{
			print $data[$i];
		}
		//return "";
	}
	//Send Json
	function GetAllVisitors()
	{
		

		$sql = <<<SQL
    		SELECT *
    		FROM visitor
SQL;

		$this->db->query($sql);
		$jsonA = array();
		while($row = $this->db->result->fetch_assoc()){
   
   			$jsonA[] =$row;
		}
		
		//return json_encode($jsonA);
		return json_encode($jsonA);
					
	}
}

?>