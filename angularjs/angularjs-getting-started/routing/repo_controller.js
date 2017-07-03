(function() {
    var app = angular.module("githubViewer");

    var RepoController = function($scope, $routeParams, github) {

        var onRepos = function(data) {
            $scope.repo = data;
        };

        var onError = function(reason) {
            $scope.error = reason;
        }

        var reponame = $routeParams.reponame;
        var username = $routeParams.username;

        github.getRepoDetails(username, reponame).then(onRepos, onError);
    };

    app.controller('RepoController', RepoController);
}());