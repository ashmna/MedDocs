<?php

namespace MD\DAO;


interface Counter {
    function getNextIndex($counterName);
}