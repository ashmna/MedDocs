<?php


namespace MD\DAO\Impl;


use MD\Helpers\App;
use MD\Helpers\Config;
use MD\Helpers\Defines;
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

        $where = ['partnerId =:partnerId'];

        foreach ($filter as $key => $val) {
            $likeVal = '%' . preg_replace('/\s+/', '%', trim($val)) . '%';
            switch ($key) {
                case 'username':
                    $where[] = 'username LIKE :username';
                    $bind['username'] = $likeVal;
                    break;
                case 'role':
                    switch ($val) {
                        case Defines::ROLE_DOCTOR:
                            $tableName = 'doctors';
                            break;
                        case Defines::ROLE_CLIENT:
                            $tableName = 'clients';
                            break;
                    }
            }
        }

        $where = implode(' AND ', $where);
        $users = $this->db->select($tableName, $where, $bind);

        return $users;
    }


}