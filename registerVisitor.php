<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$data = json_decode(file_get_contents("php://input"));
$un = $data->username; 
$pw = $data->password;



require "CVisitor.php";


$v = new Visitor();
$v->VoegVisitorToe($un,$pw);


?>