<?php


namespace MD\Models;


use MD\Helpers\Model;

class Client extends Model {
    protected $partnerId;
    protected $userId;

    public function setUserId($userId) {
        $this->userId = $userId;
    }
}