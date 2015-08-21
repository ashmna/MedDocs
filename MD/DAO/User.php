<?php


namespace MD\DAO;


interface User {
    /**
     * @param String $username
     * @return \AFF\Models\User|null
     */
    function getUserByUsername($username);
    function createUser(array $userData);
}