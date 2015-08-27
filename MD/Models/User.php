<?php


namespace MD\Models;


use MD\Helpers\Defines;
use MD\Helpers\Model;

class User extends Model {

    protected $partnerId;
    protected $userId;
    protected $userName;
    protected $email;
    protected $role = Defines::ROLE_CLIENT;
    protected $passHash;
    protected $pass;

    public function __construct($data = []) {
        parent::__construct($data);

        if(empty($this->pass)) {
            $this->setPass(self::generateRandomString(4));
        }
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }
    public function setUserName($userName) {
        $this->userName = $userName;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setRole($role) {
        $this->role = $role;
    }
    public function setPassHash($passHash) {
        $this->passHash = $passHash;
    }
    public function setPass($pass) {
        $this->pass = $pass;
        if(empty($this->passHash)) {
            $this->passHash = self::genPassHash($pass);
        }
    }
    public function isPasswordEqual($password) {
        return self::genPassHash($password) == $this->passHash;
    }
    public function getRole() {
        return $this->role;
    }


    protected static function genPassHash($pass) {
        return sha1($pass);
    }

    protected static function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}