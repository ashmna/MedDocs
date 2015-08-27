app.directive('perfectUploaderPreview', function () {
        return function(scope,element,attrs){

            //var inputName = attributes['perfectUploaderPreview'];
            //var input = angular.element('<input type="file" name="avatar" style="display: none">');
            //element.append(input);

            var input = element[0].querySelector('input');
            var image = element[0].querySelector('img');

            $(image).click(function(){
                $(input).click();
            });
            $(input).change(function(){

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $(image).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);

                    scope.$apply(function (scope) {
                        $parse(attrs.ngModel).assign(scope, input.files[0]);
                    });
                }
            });
        }
    });