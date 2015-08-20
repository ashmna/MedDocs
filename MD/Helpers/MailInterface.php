<?php

namespace MD\Helpers;


interface MailInterface {
    public function getSubject();
    public function getBody();
    public function getAddress();
}