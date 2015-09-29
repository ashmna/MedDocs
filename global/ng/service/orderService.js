app.service('orderService', ['serverConnector', function (serverConnector) {
    'use strict';

    function url(url) {
        return '/api/order/' + url + '/';
    }

    this.getEventsFromMonth = function (year, month) {
        return serverConnector.send({
            method: 'GET',
            url   : url('get-events-from-month'),
            params: {year:year, month: month}
        });
    };

    this.findClients = function(client) {
        return serverConnector.send({
            url  : url('find-clients'),
            data : {client:client}
        });
    };

    this.saveOrder = function(order) {
        return serverConnector.send({
            url  : url('save-order'),
            data : {order:order}
        });
    };

    this.updateOrderDates = function(orderId, start, end) {
        return serverConnector.send({
            url  : url('update-order-dates'),
            data : {
                orderId:orderId,
                start:start.utc().format('YYYY-MM-DD HH:mm'),
                end:end.utc().format('YYYY-MM-DD HH:mm')
            }
        });
    }


}]);