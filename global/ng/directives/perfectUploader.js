app.directive('perfectUploaderPreview', function ($parse) {
        return function(scope,element,attrs){

            var input = element[0].querySelector('input');
            var image = element[0].querySelector('img');
            var button = element[0].querySelector('button');

            if (attrs.hasOwnProperty('showUploadButton')) {
                var buttonElement = angular.element('<div class="center-align-text"><button class="btn btn-sm btn-info">Upload</button></div>');
                element.after(buttonElement);

                $(buttonElement).click(function(){
                    $(input).click();
                });
            }

            element.bind("click", function(e){
                $(input).click();
            });

            $(input).change(function(){

                if (input.files && input.files[0]) {
                    var file = input.files[0];
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var src = e.target.result;
                        scope.$apply(function (scope) {
                            $parse(attrs.ngModel).assign(scope, {fileName: file, src: src});
                        });
                        $(image).attr('src', src);
                    };

                    reader.readAsDataURL(file);
                }
            });
        }
    });