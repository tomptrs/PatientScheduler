angular.module("SampleApp").controller("makeAVisitController", ['$scope', '$http', makeAVisitController]);



function makeAVisitController($scope,$http) 
  {    

    $scope.submit_visit = function()
    {    	
    	 $http.post('http://localhost/VisitAPatient/makeAVisit.php?action=add_visit', 
            {
               // 'userid'       : $scope.userId, 
                'firstname'	   : $scope.firstName,
                'lastname'     : $scope.lastName,	
                'patientId'    : $scope.patientId,               
                'datum'		   : $scope.datum,
                'startUur'	   : $scope.startUur,
                'eindUur'	   : $scope.eindUur
            }
        )
        .success(function (data, status, headers, config) {
          alert("Visit has been Submitted Successfully" + data + " " + status);
       //alert(data);		 

 
        })
 
        .error(function(data, status, headers, config){
           
        });
    };

  }