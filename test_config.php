<?php
$config = include "config.php";
return array_replace_recursive($config, [
    'test'       => true,
    'useSession' => false,

]);