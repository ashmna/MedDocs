<?php

namespace MD\Services;


interface UserService {
    function login($username, $password, $rememberMe = false);
    function logout();
}