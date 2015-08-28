<?php


namespace AFF\DAO\Impl;


use MD\DAO\Counter;

class CounterImpl implements Counter {

    /**
     * @Inject
     * @var \MD\Helpers\DB
     */
    protected $db;

    function getNextIndex($counterName) {
        $bind = [
            'counterName' => $counterName
        ];
        $query = 'CALL getCounterNextIndex(:counterName)';
        $res = $this->db->run($query, $bind, ['fetch' => true]);
        return $res[0]['lastIndex'];
    }

}