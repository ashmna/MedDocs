<?php


namespace MD\Services\Impl;


use MD\Helpers\Defines;
use MD\Models\Client;
use MD\Models\Order;
use MD\Services\OrderService;

class OrderServiceImpl implements OrderService
{

    /**
     * @Inject
     * @var \MD\DAO\User
     */
    protected $userDao;
    /**
     * @Inject
     * @var \MD\DAO\Order
     */
    protected $orderDao;

    public function getOrdersFromMonth($year, $month) {
        // TODO: Implement getOrdersFromMonth() method.
    }

    public function findClients(Client $client) {
        $filter = $client->toArray();
        $filter['role'] = Defines::ROLE_CLIENT;
        return $this->userDao->getUsersList($filter);

    }

    public function saveOrder(Order $order) {
        /** @var Client $client */
        $client = $order->getClient();
        if(empty($client->getClientId())) {
            $clientData = $client->toArray();
            $clientData['role'] = Defines::ROLE_CLIENT;
            $clientId = $this->userDao->createUser($clientData);
            $order->setClientId($clientId);
        }

        if(empty($order->getOrderId())) {
            $orderId = $this->orderDao->crateOrder($order);
            $order->setOrderId($orderId);
        } else {
            $this->orderDao->editOrder($order);
        }

        return $order->toArray();
    }


}