<?php


namespace AFF\Services\Impl;


use AFF\Services\UserService;
use MD\Helpers\App;

class UserServiceImpl implements UserService {

    function login($username, $password, $rememberMe = false) {
        $session = App::getSession();
        $session->isLogged = true;
    }

    function logout() {
        $session = App::getSession();
        $session->isLogged = false;
    }

}