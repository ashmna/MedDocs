<?php


namespace MD\Services\Impl;


use MD\Helpers\Config;
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
    /**
     * @Inject
     * @var \MD\DAO\WorkingTimes
     */
    protected $workingTimesDao;

    public function getEventsFromMonth($year, $month) {
        $events = [];

        $workingTimes = self::convertWorkingTimesToEvents($this->workingTimesDao->getWorkingTimesByMonth(2, $year, $month));

        $orderEvents = self::convertOrdersToEvents($this->orderDao->getOrdersByMonth(2, $year, $month));

        $events = array_merge($events, $workingTimes, $orderEvents);

        return $events;
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

    public function updateOrderDates($orderId, \DateTime $start, \DateTime $end) {
        $this->orderDao->updateOrderDates($orderId, $start, $end);
        return [
            'start' => $start->format('Y-m-d H:i:s'),
            'end'   => $end->format('Y-m-d H:i:s'),
        ];
    }


    private static function convertWorkingTimesToEvents(array $workingTimes) {
        $events = [];
        $color = Config::getInstance()->grtColor('workingTimes');
        foreach($workingTimes as $date => $rows) {
            foreach($rows as $row) {
                $events[] = [
                    'start'     => $date.' '.$row['startTime'],
                    'end'       => $date.' '.$row['endTime'],
                    'rendering' => 'background',
                    'color'     => $color,
                ];
            }
        }
        return $events;
    }

    private static function convertOrdersToEvents(array $orders) {
        $events = [];
        foreach($orders as $date => $row) {
            $events[] = [
                'orderId' => $row['orderId'],
                'start'   => $row['start'],
                'end'     => $row['end'],
                'title'   => $row['orderId'].'  '.$row['description'],
            ];
        }
        return $events;
    }


}