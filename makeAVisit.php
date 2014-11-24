<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

/*
 * 
 * 				'firstName'       : $scope.firstName,
 * 				'' 
                'patientId'    : $scope.patientId,               
                'datum'		   : $scope.datum,
                'startUur'	   : $scope.startUur,
                'eindUur'	   : $scope.eindUur
 * */

$data = json_decode(file_get_contents("php://input"));
$fn = $data->firstname;
$ln = $data->lastname;
$patientId = $data->patientId; 
$datum = $data->datum;
$startuur = $data->startUur;
$einduur = $data->eindUur;


require "CVisitor.php";

$v = new Visitor();
$v->MakeAVisit(0,$patientId,$datum,$startuur,$einduur,$fn,$ln);


?>