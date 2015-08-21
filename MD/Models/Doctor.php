<?php


namespace AFF\Models;


use MD\Helpers\Model;

class Doctor extends Model {
    protected $partnerId;
    protected $userId;

    public function setUserId($userId) {
        $this->userId = $userId;
    }
}