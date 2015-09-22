<?php


namespace MD\Models;


use MD\Helpers\Defines;
use MD\Helpers\FileSystem;
use MD\Helpers\Model;

class Client extends Model {
    protected $partnerId;
    protected $userId;

    protected $clientId;
    protected $avatar;
    protected $avatarUrl;
    protected $firstName;
    protected $lastName;
    protected $patronymicName;
    protected $gender;
    protected $email;
    protected $phone;
    protected $birthDay;
    protected $address;
    protected $lastVisitedDate;

    public function setUserId($userId) {
        $this->userId = $userId;
        if(empty($this->clientId)) {
            $this->clientId = $this->userId;
        }
    }

    public function setBirthDay($birthDay) {
        $this->birthDay = new \DateTime($birthDay);
    }

    public function setAvatar($avatar) {
        if(is_array($avatar)) {
            $this->avatar = FileSystem::crateFileFromBase64($avatar['src'], $avatar['fileName'], Defines::FILE_TYPE_IMAGE);
        } else {
            $this->avatar = $avatar;
        }
        if(!empty($this->avatar)) {
            $this->avatarUrl = FileSystem::fileNameToPath($this->avatar);
        }
    }

    public function toArray() {
        $data = parent::toArray();
        if($this->birthDay instanceof \DateTime) {
            $data['birthDay'] = $this->birthDay->format('Y-m-d');
        }
        return $data;
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
        if(empty($this->userId)) {
            $this->userId = $this->clientId;
        }
    }

}