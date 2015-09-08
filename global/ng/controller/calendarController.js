app.controller('calendarController', ['$scope', 'uiCalendarConfig', 'orderService', 'SweetAlert',
function ($scope, uiCalendarConfig, orderService, SweetAlert) {
    'use strict';

    var getCalendar = function() {
        return uiCalendarConfig.calendars.doctor;
    };
    $scope.editOrder = {
        client:{}
    };

    $scope.eventSources = [
        {
            start: '2015-09-07 00:00:00',
            end: '2015-09-07 10:00:00',
            rendering: 'background',
            color: '#ff9f89'
        },
        {
            start: '2015-09-07 14:00:00',
            end: '2015-09-07 15:00:00',
            rendering: 'background',
            color: '#ff9f89'
        },
        {
            start: '2015-09-07 19:00:00',
            end: '2015-09-07 24:00:00',
            rendering: 'background',
            color: '#ff9f89'
        }
    ];
    /* config object */
    $scope.config = {
        defaultView: 'agendaDay',
        allDaySlot: false,
        firstDay: 1,
        slotDuration: '00:15:00',
        firstHour: (new Date).getHours() -1,
        smallTimeFormat: 'HH(:mm)',
        height: "100%",
        businessHours: false,
        editable: true,
        header:{
            left  : 'today prev,next',
            center: 'title',
            right : 'month,agendaWeek,agendaDay'
        },
        dayClick: function(){console.log('dayClick', arguments)},
        eventDrop: function(){console.log('eventDrop', arguments)},
        eventResize: function(){console.log('eventResize', arguments)},
        selectable: true,
        selectHelper: false,

        events: $scope.eventSources,

        select: function(start, end) {
            $scope.editOrder = {
                start : start,
                end   : end,
                client:{}
            };
            $scope.openPopup(event);

            getCalendar().fullCalendar('unselect');
            //getCalendar().fullCalendar('renderEvent', eventData, true); // stick? = true


            //console.log(getCalendar());
            //SweetAlert.swal({
            //    title: 'HTML <small>Title</small>!',
            //    text: 'A custom <span style="color:#F8BB86">html<span> message.',
            //    html: true
            //});
            //getCalendar().fullCalendar('unselect');
            //TeamCalendar.fullCalendar('unselect');
        }
    };



    $scope.openPopup = function() {
        var el = $('#order-modal');
        el.modal('show');

        el.css({paddingRight:'17px'});
        $('body').css({paddingRight:'17px'});
    };

    $scope.closePopup = function() {
        var el = $('#order-modal');
        el.css({paddingRight:'0px'});

        el.modal('hide');
        $('body').css({paddingRight:'0px'});

    };

    $scope.validateSearchString = function() {
        $scope.editOrder.client.phone = $scope.editOrder.client.searchString.replace(/\D/g,'');
        if(typeof $scope.editOrder.client.searchString.split(" ")[0] != 'undefined') {
            $scope.editOrder.client.firstName = $scope.editOrder.client.searchString.split(" ")[0].replace(/\d/g,'');
        }
        if(typeof $scope.editOrder.client.searchString.split(" ")[1] != 'undefined') {
            $scope.editOrder.client.lastName = $scope.editOrder.client.searchString.split(" ")[1].replace(/\d/g,'');
        }

    };







}]);