<?php

namespace MD\Tests\Unit\Services;


use MD\Helpers\UnitTestCase;
use MD\Services\Impl\OrderServiceImpl;

class OrderServiceImplTest extends UnitTestCase {
    // Test class
    /** @var OrderServiceImpl */
    private $orderService;
    // Mocks
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $workingTimesDao;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $orderDao;
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $userDao;

    public function setUp() {
        // Call superclass
        parent::setUp();
        // Init test class
        $this->orderService = new OrderServiceImpl();
        // Init mocks
        $this->userDao = $this->getMockBuilder('\MD\DAO\User')->getMock();
        $this->orderDao = $this->getMockBuilder('\MD\DAO\Order')->getMock();
        $this->workingTimesDao = $this->getMockBuilder('\MD\DAO\WorkingTimes')->getMock();
        // Set Mocks
        $this->setMock($this->orderService, 'userDao', $this->userDao);
        $this->setMock($this->orderService, 'orderDao', $this->orderDao);
        $this->setMock($this->orderService, 'workingTimesDao', $this->workingTimesDao);
    }

    public function testGetEventsFromMonth() {
        // Test data
        $year = 2016;
        $month = 1;
        // Expectation
        $this->workingTimesDao
            ->expects($this->once())
            ->method('getWorkingTimesByMonth')
            ->with(2, $year, $month)
            ->willReturn([]);
        $this->orderDao
            ->expects($this->once())
            ->method('getOrdersByMonth')
            ->with(2, $year, $month)
            ->willReturn([]);
        // Run test
        $events = $this->orderService->getEventsFromMonth($year, $month);
        $this->assertEquals($events, []);
    }

    public function testFindClients() {
        $r = 5;
        // Client $client
    }

    public function testSaveOrder() {
        $r = 5;
        // Order $order
    }

    public function testUpdateOrderDates() {
        // Test data
        $orderId = 1;
        $start = new \DateTime("2016-01-17 14:00:00");
        $end = new \DateTime("2016-01-17 18:00:00");
        // Expectation
        $this->orderDao
            ->expects($this->once())
            ->method("updateOrderDates")
            ->with($orderId, $start, $end)
            ->willReturn(1);
        // Run test
        $result = $this->orderService->updateOrderDates($orderId, $start, $end);
        $this->assertEquals($result, [
            'start' => "2016-01-17 14:00:00",
            'end'   => "2016-01-17 18:00:00",
        ]);
    }





}