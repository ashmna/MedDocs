<?php


namespace MD\Services;


use MD\Models\Client;

interface OrderService
{
    function getOrdersFromMonth($year, $month);
    function findClients(Client $client);
}