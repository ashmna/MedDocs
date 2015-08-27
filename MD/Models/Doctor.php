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


    public function setBirthDay($birthDay) {
        $this->birthDay = new \DateTime($birthDay);
    }

    public function toArray() {
        $data = parent::toArray();
        if($this->birthDay instanceof \DateTime) {
            $data['birthDay'] = $this->birthDay->format('Y-m-d');
        }
        return $data;
    }



}