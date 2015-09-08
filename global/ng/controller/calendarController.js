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

    $scope.initAutocomplete = function() {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        var autocomplete = $('#search-client').autocomplete({
            source: function( request, response ) {
               /* request.term
                $.ajax({
                    url: "http://gd.geobytes.com/AutoCompleteCity",
                    dataType: "jsonp",
                    data: {
                        q: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });*/

                console.log('source');

                response(
                    [
                        "AppleScript",
                        "Asp"        ,
                        "BASIC"      ,
                        "C"          ,
                        "C++"        ,
                        "Clojure"    ,
                        "COBOL"      ,
                        "ColdFusion" ,
                        "Erlang"     ,
                        "Fortran"    ,
                        "Groovy"     ,
                        "Haskell"    ,
                        "Java"       ,
                        "JavaScript" ,
                        "Lisp"       ,
                        "Perl"       ,
                        "PHP"        ,
                        "Python"     ,
                        "Ruby"       ,
                        "Scala"      ,
                        "Scheme"
                    ]
                );
            },
            minLength: 1,
            select: function( event, ui ) {
                //log( ui.item ?
                //"Selected: " + ui.item.label :
                //"Nothing selected, input was " + this.value);
            },
            open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
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
        //        <a>'+ item.label +'\
        //        </a>\
        //    </li>').appendTo( ul );
        //};
    };








}]);