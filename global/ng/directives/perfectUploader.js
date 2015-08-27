app.directive('perfectUploaderPreview', function ($parse) {
        return function(scope,element,attrs){

            //var inputName = attributes['perfectUploaderPreview'];
            //var input = angular.element('<input type="file" name="avatar" style="display: none">');
            //element.append(input);

            var input = element[0].querySelector('input');
            var image = element[0].querySelector('img');
            var button = element[0].querySelector('button');

            if (attrs.hasOwnProperty('showUploadButton')) {
                var input = angular.element('<button class="btn btn-sm btn-info">Upload</button>');
                element.append(input);
            }
            $(image).click(function(){
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