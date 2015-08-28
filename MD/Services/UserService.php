<?php

namespace MD\Services;


interface UserService {
    function login($username, $password, $rememberMe = false);
    function logout();
    function register(array $userData);
    function getUsersList($type);
}