<?php


namespace MD\DAO\Impl;


use MD\Helpers\App;
use MD\Helpers\Config;
use MD\Helpers\Defines;
use MD\Helpers\Notification;
use MD\Models\Client;
use MD\Models\Doctor;
use MD\Models\User;

class UserImpl implements \MD\DAO\User
{

    /**
     * @Inject
     * @var \MD\Helpers\DB
     */
    protected $db;

    /** @inheritdoc */
    public function getUserByUsername($username)
    {
        $bind = [
            'partnerId' => Config::getInstance()->partnerId,
            'username' => $username,
        ];
        $user = null;
        $users = $this->db->select('users', 'partnerId = :partnerId and username = :username', $bind);
        if (count($users) == 1) {
            $user = new User($users[0]);
        }
        return $user;
    }

    public function createUser(array $userData)
    {
        $user = new User($userData);
        if(empty($user->getUserName())) {
            $user->setUserName('user'.App::getCounterNextIndex('user'));
        }

        $userId = $this->db->insert('users', $user->toArray());
        switch ($user->getRole()) {
            case Defines::ROLE_CLIENT;
                $client = new Client($userData);
                $client->setUserId($userId);
                $this->db->insert('clients', $client->toArray());
                break;
            case Defines::ROLE_DOCTOR;
                $doctor = new Doctor($userData);
                $doctor->setUserId($userId);
                $this->db->insert('doctors', $doctor->toArray());
                break;
        }
        return $userId;
    }

    public function getUsersList(array $filter = [])
    {
        $tableName = 'users';

        $bind = [
            'partnerId' => Config::getInstance()->partnerId
        ];

        $where = ['users.partnerId =:partnerId'];

        foreach ($filter as $key => $val) {
            if(empty($val)) {
                continue;
            }
            $likeVal = '%' . preg_replace('/\s+/', '%', trim($val)) . '%';
            switch ($key) {
                case 'username':
                    $where[] = 'username LIKE :username';
                    $bind['username'] = $likeVal;
                    break;
                case 'role':
                    switch ($val) {
                        case Defines::ROLE_DOCTOR:
                            $tableName = 'doctors, users';
                            $where[] = 'doctorId = userId';
                            break;
                        case Defines::ROLE_CLIENT:
                            $tableName = 'clients, users';
                            $where[] = 'clientId = userId';
                            break;
                    }
                    break;
                case 'firstName':
                    $where[] = 'firstName LIKE :firstName';
                    $bind['firstName'] = $likeVal;
                    break;
                case 'lastName':
                    $where[] = 'lastName LIKE :lastName';
                    $bind['lastName'] = $likeVal;
                    break;
                case 'phone':
                    $where[] = 'phone LIKE :phone';
                    $bind['phone'] = $likeVal;
                    break;
            }
        }

        $where = implode(' AND ', $where);
        $users = $this->db->select($tableName, $where, $bind);

        foreach($users as &$row) {
            $row['showName'] = User::getShowName($row);
        }

        return $users;
    }

    function deleteUserById($userId)
    {
        $bind = [
            'partnerId' => Config::getInstance()->partnerId,
            'userId'    => $userId,
        ];
        $user = $this->db->select('users', 'partnerId = :partnerId AND userId = :userId', $bind);
        if(count($user) == 1) {
            $user = $user[0];
            $userId = $user['userId'];
            switch ($user['role']) {
                case Defines::ROLE_DOCTOR:
                    $this->db->delete('doctors', 'doctorId = :userId', ['userId' => $userId]);
                    break;
                case Defines::ROLE_CLIENT:
                    $this->db->delete('clients', 'clientId = :userId', ['userId' => $userId]);
                    break;
            }
            return $this->db->delete('users', 'userId = :userId', ['userId' => $userId]);
        }
        return false;
    }

    public function updateUser(array $userData)
    {
        $user = new User($userData);
        $userId = $user->getUserId();
        if(empty($userId)) {
            return Notification::error('UserId is empty');
        }
        if(empty($user->getUserName())) {
            $user->setUserName('user'.App::getCounterNextIndex('user'));
        }

        $userTableUpdate = $this->db->update('users', $user->toArray(), 'userId = :userId', ['userId' => $userId]);
        if($userTableUpdate) {
            switch ($user->getRole()) {
                case Defines::ROLE_DOCTOR:
                    $doctor = new User($userData);
                    return $this->db->update('doctors', $doctor->toArray(), 'doctorId = :userId', ['userId' => $userId]);
                case Defines::ROLE_CLIENT:
                    $client = new User($userData);
                    return $this->db->update('clients', $client->toArray(), 'clientId = :userId', ['userId' => $userId]);
            }
        }

        return false;
    }

}