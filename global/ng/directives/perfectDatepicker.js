app.directive('perfectDatepicker', ['$parse', function ($parse) {
    return {
        link: function (scope, element, attrs) {

            jQuery(function () {
                $(element[0]).datepicker({
                    format: 'dd/mm/yyyy',
                    startDate: new Date('1945-01-01'),
                    autoclose: true,
                    startView: 2
                }).on('changeDate', function (e) {
                    scope.$apply(function (scope) {
                        $parse(attrs.ngModel).assign(scope, e.date);
                    });
                });
            });
        }
    }
}]);