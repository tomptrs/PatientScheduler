<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "CVisitor.php";

$v = new Visitor();
print $v->GetVisitorsFromPatient(1);
?>