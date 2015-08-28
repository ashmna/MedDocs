<?php


namespace MD\DAO;


interface User {
    /**
     * @param String $username
     * @return \MD\Models\User|null
     */
    function getUserByUsername($username);
    function createUser(array $userData);
    function getUsersList(array $filter=[]);
}