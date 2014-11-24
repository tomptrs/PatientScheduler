<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "CPatient.php";

$p = new Patient();
print $p->GetAllPatients();
?>