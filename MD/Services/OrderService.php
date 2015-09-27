<?php


namespace MD\Services;


use MD\Models\Client;
use MD\Models\Order;

interface OrderService
{
    function getEventsFromMonth($year, $month);
    function findClients(Client $client);
    function saveOrder(Order $order);
}