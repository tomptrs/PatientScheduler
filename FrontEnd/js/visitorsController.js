angular.module("SampleApp").controller("visitorsController", ['$scope', '$http', visitorsController]);

function visitorsController($scope,$http) {  
    $http.get("http://localhost/VisitAPatient/GetVisitorsFromPatients.php").success(function(response)
     {
     	

     	$scope.names = response;
     	
     	
     	
    	
     });
     
     $scope.submit_confirm = function(arg)
    	{
    		//alert(arg);
    		//bootbox.alert("Hello world!");

    	};
}