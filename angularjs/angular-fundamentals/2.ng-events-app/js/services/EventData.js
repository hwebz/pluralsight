'use strict';

eventsApp.factory('eventData', function() {
    return {
        event: {
            name: 'Angular App Development',
            date: '1/1/2017',
            time: '12:30',
            location: {
                address: '123 Washington DC, CA',
                city: 'California',
                province: 'CA'
            },
            imageUrl: 'https://cdn.worldvectorlogo.com/logos/angular-icon-1.svg',
            sessions: [
                {
                    name: 'Directives Masterclass',
                    creatorName: 'Bob Smith',
                    duration: 2,
                    level: 'Advanced',
                    abstract: 'In this session you will learn the ins and outs of directives!',
                    upVoteCount: 3
                },
                {
                    name: 'Scopes for fun and profit',
                    creatorName: 'John Doe',
                    duration: 1,
                    level: 'Introductory',
                    abstract: 'This session will take a closer look at scopes. Learn what they do, how they can apply into a page?',
                    upVoteCount: 2
                },
                {
                    name: 'Well Behaved Controllers',
                    creatorName: 'Jane Doe',
                    duration: 4,
                    level: 'Intermediate',
                    abstract: 'In this session you will learn the ins and outs of directives!',
                    upVoteCount: 0
                }
            ]
        }
    };
});