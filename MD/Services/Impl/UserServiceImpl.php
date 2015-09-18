<?php


namespace MD\Services\Impl;


use MD\Services\UserService;
use MD\Helpers\App;
use MD\Helpers\Notification;

/**
 * Class UserServiceImpl
 * @package MD\Services\Impl
 * @Transactional
 */
class UserServiceImpl implements UserService {

    /**
     * @Inject
     * @var \MD\DAO\User
     */
    protected $userDao;

    public function login($username, $password, $rememberMe = false) {
        //TODO: Ashot implement user login rememberMe
        $user = $this->userDao->getUserByUsername($username);
        if(isset($user)) {
            if($user->isPasswordEqual($password)) {
                $session = App::getSession();
                $session->isLogged = true;
            } else {
                Notification::error(2, '');
                //TODO: Armen Notification text for not correct password
            }
        } else {
            Notification::error(1, '');
            //TODO: Armen Notification text for invalid username
        }
        return App::isLoggedUser();
    }

    public function logout() {
        $session = App::getSession();
        $session->isLogged = false;
    }

    public function register(array $userData) {
        $userId = $this->userDao->createUser($userData);
        Notification::success(3, '');
        //TODO: Armen Notification text for success register user
        return $userId;
    }

    public function getUsersList(array $filter) {
        return $this->userDao->getUsersList($filter);
    }


}