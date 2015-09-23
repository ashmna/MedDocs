<?php


namespace MD\DAO\Impl;



use MD\Helpers\Config;
use MD\Models\Order;

class OrderImpl implements \MD\DAO\Order
{
    /**
     * @Inject
     * @var \MD\Helpers\DB
     */
    protected $db;

    public function getOrderTypes() {
        return $this->db->select('orderTypes');
    }

    public function crateOrder(Order $order) {
        return $this->db->insert('orders', $order->toArray());
    }

    public function editOrder(Order $order) {
        return $this->db->update('orders', $order->toArray(),
            'partnerId = :partnerId AND orderId = :orderId', [
                'partnerId ' => $order->getPartnerId(),
                'orderId'    => $order->getOrderId()
            ]);
    }

    public function deleteOrder($orderId) {
        return $this->db->delete('orders',
            'partnerId = :partnerId AND orderId = :orderId', [
                'partnerId ' => Config::getInstance()->partnerId,
                'orderId'    => $orderId
            ]);
    }


}