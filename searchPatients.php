<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));
$un = $data->username; 




require "CPatient.php";

$p = new Patient();
print $p->ZoekPatientOpUserName($un);
?>