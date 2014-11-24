angular.module("SampleApp").controller("searchController", ['$scope', '$http', searchController]);

function searchController($scope,$http) {
   // $http.get("http://www.w3schools.com/website/Customers_JSON.php").success(function(response)
   
$scope.search = function()
    {
    	 $http.post('http://localhost/VisitAPatient/searchPatients.php?action=search_patient', 
            {
                'username'     : $scope.username
                
            }
        )
        .success(function (data, status, headers, config) {
        	alert(data);
          $scope.data = data;
          $scope.result = data;
        })
 
        .error(function(data, status, headers, config){
           alert(data);
        });

    };
}
/*
angular.module("SampleApp").controller("searchController", ['$scope', '$http', searchController]);

function searchController($scope,$http) {
   

//$scope.url = 'http://localhost/VisitAPatient/searchPatients.php'; // The url of our search
		
	// The function that will be executed on button click (ng-click="search()")
	$scope.search = function() {
		alert();
		// Create the http post request
		// the data holds the keywords
		// The request is a JSON request.
		/*
		$http.post($scope.url, { "data" : $scope.keywords}).
		success(function(data, status) {
			$scope.status = status;
			$scope.data = data;
			$scope.result = data; // Show result from server in our <pre></pre> element
		})
		.
		error(function(data, status) {
			$scope.data = data || "Request failed";
			$scope.status = status;			
		});
		*/
//	};


//}