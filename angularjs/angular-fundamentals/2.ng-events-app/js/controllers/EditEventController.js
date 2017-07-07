'use strict';

eventsApp.controller('EditEventController', function($scope) {
    $scope.saveEvent = function(event, newEventForm) {
        if (newEventForm.$valid) {
            console.log(22222);
        }
    }

    $scope.cancelEdit = function() {
        window.location = '/2.ng-events-app/NewEvent.html';
    }
});