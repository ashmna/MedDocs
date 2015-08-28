<?php


namespace MD\Models;


use MD\Helpers\Model;

class Client extends Model {
    protected $partnerId;
    protected $userId;

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

}