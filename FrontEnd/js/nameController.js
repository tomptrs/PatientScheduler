angular.module("SampleApp").controller("NameController", ['$scope', nameController]);

function nameController($scope) {
    $scope.myName = "Bill Gates";
    $scope.changeName = function () {
        $scope.myName = "Steve Jobs";
    };
};