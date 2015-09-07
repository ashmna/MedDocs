app.service('orderService', ['serverConnector', function (serverConnector) {
    'use strict';

    function url(url) {
        return '/api/order/' + url + '/';
    }

    this.getOrdersFromMonth = function (year, month) {
        return serverConnector.send({
            method: 'GET',
            url   : url('get-orders-from-month'),
            params: {year:year, month: month}
        });
    };

}]);