angular.module("SampleApp").controller("jsonController", ['$scope', '$http', jsonController]);

function jsonController($scope,$http) {
   // $http.get("http://www.w3schools.com/website/Customers_JSON.php").success(function(response)
    $http.get("http://localhost/VisitAPatient/GetPatients.php").success(function(response)   
     {
     	$scope.names = response;
     });
}