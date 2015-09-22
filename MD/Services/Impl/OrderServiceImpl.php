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
    protected $user;

    public function getOrdersFromMonth($year, $month) {
        // TODO: Implement getOrdersFromMonth() method.
    }

    public function findClients(Client $client) {
        $filter = $client->toArray();
        $filter['role'] = Defines::ROLE_CLIENT;
        return $this->user->getUsersList($filter);

    }

    public function saveOrder(Order $order) {
        return [
            'start' => date('Y-m-d H:00:00'),
            'end'   => date('Y-m-d H:59:59'),
            'title' => 'Type 1',
        ];
    }


}