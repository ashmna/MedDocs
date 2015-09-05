app.controller('calendarController', ['$scope',
function ($scope) {

    'use strict';

    $scope.eventSources = [];

    /* config object */
    $scope.calendar = {
        defaultView: 'agendaDay',
        allDaySlot: false,
        firstDay: 1,
        slotDuration: '00:15:00',
        firstHour: (new Date).getHours() -1,
        smallTimeFormat: 'HH(:mm)',
        height: "100%",
        editable: true,
        header:{
            left: 'month agendaWeek agendaDay',
            center: 'title',
            right: 'today prev,next'
        },
        dayClick: function(){console.log('dayClick', arguments)},
        eventDrop: function(){console.log('eventDrop', arguments)},
        eventResize: function(){console.log('eventResize', arguments)},
        selectable: true,
        selectHelper: false,
        select: function() {
            console.log(arguments);
            alert(555555);
            //TeamCalendar.fullCalendar('unselect');
        }
    };


}]);