angular.module("SampleApp", ["ngRoute"]);

angular.module("SampleApp").config([
    '$routeProvider',
    function($routeProvider) {
        $routeProvider
            .when('/NewPatient', { templateUrl: 'Views/VoegPatientToeView.html' })
            .when('/ToonPatient', { templateUrl: 'Views/jsonView.html' })
            .when('/VisitPatient', { templateUrl: 'Views/visitorsView.html' })
            .when('/MakeAVisit', { templateUrl: 'Views/makeAVisitView.html' })
            .when('/RegisterVisitor', { templateUrl: 'Views/registerVisitorView.html' })
            .when('/SearchPatient', { templateUrl: 'Views/searchView.html' })
               
             .otherwise({ redirectTo: '/ToonPatient' });
    }
]);
