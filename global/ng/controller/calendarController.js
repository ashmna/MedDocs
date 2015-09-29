app.controller('calendarController', ['$scope', 'orderService', 'SweetAlert',
function ($scope, orderService, SweetAlert) {
    'use strict';

    var loadedMonthsData = {},
        calendar,
        getCalendar = function() {
            return calendar;
        };


    $scope.editOrder = {
        client:{}
    };
    $scope.inputClient = {};
    $scope.eventSources = [];

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
        dayClick:    function(event) {console.log('dayClick', arguments)},
        eventDrop:   function(event) { $scope.updateOrder(event); },
        eventResize: function(event) { $scope.updateOrder(event); },
        selectable: true,
        selectHelper: false,

        events: $scope.eventSources,
        viewRender : function(view) {
            $scope.getCalendarEvents(view.start);
            $scope.getCalendarEvents(view.end);
        },
        select: function(start, end) {
            $scope.editOrder = {
                start : start,
                end   : end,
                client:{}
            };
            $scope.openPopup();

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
    $scope.initCalendar = function(){
        $(document).ready(function() {
            calendar = $('#worker-calendar');
            calendar.fullCalendar($scope.config);
        });
    };

    $scope.getCalendarEvents = function(date) {
        date = date.utc();
        //date = getCalendar() ? getCalendar().fullCalendar('getDate') : moment(date);
        var key = date.format('YYYY')+ '-'+date.format('MM');
        if(loadedMonthsData[key]) return;
        loadedMonthsData[key] = true;

        $scope.loading = true;
        orderService.getEventsFromMonth(date.format('YYYY'), date.format('MM'))
            .success(function(data) {
                if(data && data.status) {
                    $scope.eventSources = $scope.eventSources.concat(data.result);
                    getCalendar().fullCalendar('removeEvents');
                    getCalendar().fullCalendar('addEventSource', $scope.eventSources );
                }
                $scope.loading = false;
            })
            .error(function() {
                $scope.loading = false;
            });

        //getCalendar.fullCalendar('refresh');
    };

    $scope.saveOrder = function () {
        orderService.saveOrder($scope.editOrder)
        .success(function(data){
            if(data.status) {
                $scope.closePopup();
                $scope.eventSources.push(data.result);
                getCalendar().fullCalendar('renderEvent', data.result, true);
            }
        });
    };

    $scope.updateOrder = function(event) {
        $scope.loading = true;


        var order, i=0;
        for(i=0; i<$scope.eventSources.length; ++i) {
            if($scope.eventSources[i].orderId == event.orderId) {
                order = $scope.eventSources[i];
                break;
            }
        }

        orderService.updateOrderDates(event.orderId, event.start, event.end)
            .success(function(data) {
                $scope.loading = false;
                if(data.status) {
                    order.start = data.result.start;
                    order.end   = data.result.end;
                }
            })
            .error(function() {
                $scope.loading = false;

                //TODO: Ashot cancel resizing
            });

    };



    $scope.openPopup = function() {
        var el = $('#order-modal');
        el.modal('show');

        el.addClass('modal-padding');
        $('body').addClass('modal-padding');
    };

    $scope.closePopup = function() {
        var el = $('#order-modal');

        el.on('hidden.bs.modal', function(){
            el.removeClass('modal-padding');
            $('body').removeClass('modal-padding');
        });
        el.modal('hide');

    };

    $scope.initAutocomplete = function() {
        $('#search-client').autocomplete({
            source: function( request, response ) {
                orderService.findClients($scope.inputClient).success(function(data){
                    if(data.status) {
                        var res = data.result, i = 0;
                        for(;i<res.length; ++i) {
                            res[i].label = res[i].firstName +' '+ res[i].lastName +' '+ res[i].phone;
                        }
                        response(res);
                    }
                }). error(function(){
                    response([]);
                });
            },
            minLength: 0,
            select: function( event, ui ) {
                var item = angular.copy(ui.item);
                $scope.editOrder.searchString = length;
                $scope.editOrder.client = item;
                $scope.inputClient = item;
                $scope.$apply();
            },
            focus: function( event, ui ) {
                $scope.editOrder.client = angular.copy(ui.item);
                $scope.$apply();
            },
            open: function() {
                $(this).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                $scope.editOrder.client = $scope.inputClient;
                $scope.$apply();
                $(this).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            }
        });
            //;
        //autocomplete.autocomplete( "instance" )._renderMenu = function(ul, items) {
        //    console.log('dropdown-menu');
        //    var self = this;
        //    var ddMenu = ul.append('<ul class="dropdown-menu"></ul>');
        //    $.each( items, function( index, item ) {
        //        self._renderItem( ddMenu, item );
        //    });
        //};

        //.autocomplete( "instance" )._renderItem =  function( ul, item ) {
        //    return $( "<li>" )
        //        .append( "<a>" + item.label+ " </a>" )
        //        .appendTo( ul );
        //};


        //autocomplete.autocomplete( "instance" )._renderItem = function(ul, item) {
        //    return $('<li>\
        //        <a>'+ item.showName +' '+ item.phone +'\
        //        </a>\
        //    </li>').appendTo( ul );
        //};
    };

    $scope.parsSearchString = function() {
        var arr, phone = [], lastName = [], firstName, str, i=0;
        str = $scope.editOrder.searchString.replace(/\s+/g, ' ');
        arr = str.split(" ");
        for(; i<arr.length; ++i) {
            if(arr[i].match(/\d+/g)) {
                phone.push(arr[i]);
            } else {
                if(firstName) {
                    lastName.push(arr[i]);
                } else {
                    firstName = arr[i]
                }
            }
        }

        $scope.editOrder.client = {};
        $scope.editOrder.client.firstName = firstName;
        $scope.editOrder.client.lastName = lastName.join(' ');
        $scope.editOrder.client.phone = phone.join(' ');

        $scope.inputClient = {};
        $scope.inputClient.firstName = $scope.editOrder.client.firstName;
        $scope.inputClient.lastName  = $scope.editOrder.client.lastName;
        $scope.inputClient.phone     = $scope.editOrder.client.phone;

    };







}]);