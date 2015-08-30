app.factory('serverConnector', function($http, $q) {
    'use strict';

    var req = {
        method: 'POST',
        url: '/' /*,
        headers: {
            'Content-Type': undefined
        }*/
    };

    function send (request) {
        var promise = $http(angular.merge(angular.copy(req), request));
        promise.then(
            function() {},
            function(error) {
                if(error) console.error(error);
            }
        );
        return promise;
    }

    return {
        send : send
    };
});