app.directive('perfectTimeInput', ['$parse', function ($parse) {
    return {
        link: function (scope, element, attrs) {

            if(!$.ui.timespinner) {
                $.widget( "ui.timespinner", $.ui.spinner, {
                    options: {
                        // seconds
                        step: 60 * 1000,
                        // hours
                        page: 60,
                        // angular
                        callBack:null
                    },

                    _parse: function( value ) {
                        if ( typeof value === "string" ) {
                            // already a timestamp
                            if ( Number( value ) == value ) {
                                return Number( value );
                            }
                            return moment(value, "HH:mm").unix()*1000;
                        }
                        return value;
                    },

                    _format: function( value ) {
                        value = moment(value).format("HH:mm");
                        if(this.options.callBack) this.options.callBack(value);
                        return value;
                    }
                });
            }


            jQuery(function () {
                $(element[0]).timespinner({
                    callBack : function(value){
                        $parse(attrs.ngModel).assign(scope, value);
                    }
                });
            });
        }
    }
}]);