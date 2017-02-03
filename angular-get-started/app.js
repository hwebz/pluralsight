(function() {

	var app = angular.,module('githubViewer', ["ngRoute"]);

	app.config(function($routeProvider) {
		$routeProvider.when('/main', {
			templateUrl: 'first.html',
			controller: "MainController"
		})
		.when("/user/:username", function() {
			templateUrl: "user.html",
			controller: "UserController"
		})
		.when("/repo/:username/:reponame", function() {
			
		})
		.otherwise({
			redirectTo: "/main";
		})
	});

}());