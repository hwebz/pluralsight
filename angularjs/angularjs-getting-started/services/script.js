(function() {

    var app = angular.module('githubViewer', []);

    var MainController = function($scope, github, $http, $interval, $log, $anchorScroll, $location) {
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

        var decrementCountdown = function() {
            $scope.countdown -= 1;
            if ($scope.countdown < 1) {
                $scope.search($scope.username);
            }
        }

        var countdownInterval = null;
        var startCountdown = function() {
            countdownInterval = $interval(decrementCountdown, 1000, $scope.countdown);
        }

        $scope.message = "Github Viewer";
        $scope.username = "angular";
        $scope.repoSortOrder = "+name";
        $scope.countdown = 5;
        startCountdown();

        $scope.search = function(username) {
            if (countdownInterval) {
                $interval.cancel(countdownInterval);
                $scope.countdown = 0;
            }
            $log.info("Searching for " + username);
            github.getUser(username)
                .then(onUserComplete, onError);
        }

        //$scope.search($scope.username);
    };

    app.controller("MainController", ["$scope", "github", "$http", "$interval", "$log", "$anchorScroll", "$location", MainController]);

}());