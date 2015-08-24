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

}