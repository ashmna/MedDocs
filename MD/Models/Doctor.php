<?php


namespace MD\Models;


use MD\Helpers\Model;

class Doctor extends Model {
    protected $partnerId;
    protected $userId;

    protected $email;
    protected $phone;
    protected $firstName;
    protected $lastName;
    protected $patronymicName;
    protected $gender = '';
    protected $birthDay;
    protected $address;
    protected $zipCode;

    public function setUserId($userId) {
        $this->userId = $userId;
    }


}