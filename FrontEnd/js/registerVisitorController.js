angular.module("SampleApp").controller("registerVisitorController", ['$scope', '$http', registerVisitorController]);

function registerVisitorController($scope,$http) {
	
	 $scope.submit_visitor = function()
    { 
		if ($scope.password == $scope.password2)
		{
			//Send to database
		 	   
     		 $http.post('http://localhost/VisitAPatient/registerVisitor.php?action=add_visit', 
            {
                'username'       : $scope.username, 
                'password'    : $scope.password
            }
        )
        .success(function (data, status, headers, config) {
          alert("Visit has been Submitted Successfully" + data + " " + status);
      	 alert(data);

 
        })
 
        .error(function(data, status, headers, config){
           
        });
		}
	
		else
			alert('wrong password');
   
   
    };
}