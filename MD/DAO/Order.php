<?php


namespace MD\DAO;


interface Order
{
    function getOrderTypes();
    function crateOrder(\MD\Models\Order $order);
    function editOrder(\MD\Models\Order $order);
    function deleteOrder($orderId);
    function getOrdersByMonth($doctorId, $year, $month);

}