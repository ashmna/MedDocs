<?php


namespace MD\Services\Impl;


use MD\Helpers\Defines;
use MD\Models\Client;
use MD\Services\OrderService;

class OrderServiceImpl implements OrderService
{

    /**
     * @Inject
     * @var \MD\DAO\User
     */
    protected $user;

    function getOrdersFromMonth($year, $month) {
        // TODO: Implement getOrdersFromMonth() method.
    }

    function findClients(Client $client) {
        $filter = $client->toArray();
        $filter['role'] = Defines::ROLE_CLIENT;
        return $this->user->getUsersList($filter);

    }

}