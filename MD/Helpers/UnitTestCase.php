<?php


namespace MD\Helpers;


class UnitTestCase extends \PHPUnit_Framework_TestCase {

    /** @var \MD\Helpers\App */
    protected $app;

    public function setUp() {
        Config::init('test');
        $this->app = App::getInstance();
    }

    protected function invokeMethod($class, $methodName, array $parameters = []) {
        $reflection = new \ReflectionClass(get_class($class));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($class, $parameters);
    }

    protected function setMock($class, $memberName, $mock) {
        $reflection = new \ReflectionClass(get_class($class));
        $property = $reflection->getProperty($memberName);
        $property->setAccessible(true);
        $property->setValue($class, $mock);
    }
}