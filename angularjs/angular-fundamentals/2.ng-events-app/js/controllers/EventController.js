'use strict';

eventsApp.controller('EventController', function($scope, eventData) {

    $scope.sortOrder = "name";

    $scope.snippet = '<span style="color: red">hi there</span>';
    $scope.boolValue = true;
    $scope.myStyle = {
        color: 'red'
    };
    $scope.buttonDisabled = true;
    $scope.event = eventData.event;

    $scope.upVoteSession = function(session) {
        session.upVoteCount++;
    }

    $scope.downVoteSession = function(session) {
        session.upVoteCount--;
    }
});