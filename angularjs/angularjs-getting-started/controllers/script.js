// var app = angular.module('myApp', []);

// app.controller("MainController", function($scope) {
//     $scope.message = "Hello World!";
// });

var MainController = function($scope) {
    var person = {
        firstName: "Scott",
        lastName: "Allen",
        imageSrc: "https://pbs.twimg.com/profile_images/561845397404909568/qX5361W9.jpeg"
    };

    $scope.message = "Hello, Angular!";
    $scope.person = person;
};

var GithubController = function($scope, $http) {
    var onError = function(reason) {
        $scope.error = "Could not fetch user's information";
    };
    var onUserComplete = function(response) {
        $scope.user = response.data;
    };

    $http.get('https://api.github.com/users/robconery')
        .then(onUserComplete, onError);
};