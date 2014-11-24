angular.module("SampleApp").controller("patientController", ['$scope', '$http', patientController]);



function patientController($scope,$http) 
  {    

    $scope.submit_patient = function()
    {
    	alert();
    	 $http.post('http://localhost/VisitAPatient/VoegPatientToe.php?action=add_patient', 
            {
                'username'     : $scope.username, 
                'password'     : $scope.password
            }
        )
        .success(function (data, status, headers, config) {
          alert("Patient has been Submitted Successfully");
        //  $scope.get_product();
 
        })
 
        .error(function(data, status, headers, config){
           
        });
    };

  }