(function() {

    var app = angular.module('githubViewer');

    var UserController = function($scope, github, $routeParams, $location, $anchorScroll) {
        var onUserComplete = function(data) {
            $scope.user = data;

            github.getRepos($scope.user)
                .then(onRepos, onError);
        };

        var onRepos = function(data) {
            $scope.repos = data;
            // Move cursor to specific location
            $location.hash("userDetails");
            $anchorScroll();
        };

        var onError = function(reason) {
            $scope.error = "Could not fetch the data";
        };

        $scope.username = $routeParams.username;
        $scope.repoSortOrder = "+name";
        
        github.getUser($scope.username).then(onUserComplete, onError);
    };

    app.controller("UserController", UserController);

}());