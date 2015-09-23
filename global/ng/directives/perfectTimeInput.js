app.directive('perfectTimeInput', ['$parse', function ($parse) {
    jQuery(function ($) {
        if (!$.ui.timespinner) {
            $.widget("ui.timespinner", $.ui.spinner, {
                options: {
                    // seconds
                    step    : 60 * 1000,
                    // hours
                    page    : 60,
                    // angular
                    callBack: null,
                    timestamp: 0
                },

                _parse: function (value) {
                    if (typeof value === "string") {
                        // already a timestamp
                        if (value && Number(value) == value) {
                            return Number(value);
                        }
                        return this.options.timestamp;
                    }
                    return value;
                },

                _format: function (value) {
                    this.options.timestamp = value;
                    value = moment(this.options.timestamp);
                    if (this.options.callBack) this.options.callBack(value);
                    return value.utc().format("HH:mm");
                }
            });
        }
    });

    return {

        link : function (scope, element, attr) {
            jQuery(function ($) {
                var el = $(element[0]), model;
                el.timespinner({
                    callBack : function(value) {
                        $parse(attr.perfectTimeInput).assign(scope, value);
                        scope.$apply();
                    }
                });
                el.focusout(function(){
                    if(model)
                        el.val(model.utc().format("HH:mm"));
                });

                scope.$watch(attr.perfectTimeInput, function (value) {
                    if(value) {
                        model = value;
                        el.val(value.utc().format("HH:mm"));
                        el.timespinner('option', 'timestamp', value.unix()*1000);
                    }
                });
            });




        }

    }
}]);