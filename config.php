<?php
return [
    'db' => [
        'host' => 'localhost',
        'name' => 'med_docs',
        'user' => 'root',
        'pass' => '',
    ],

    'definition' => [
        'partner.id'   => 1,
        'partner.name' => '  ',
    ],

    'email'              => [
        'smtp'    => [
            'host'     => '192.168.219.19',
            'port'     => 25, // for GMail 465 or 587
            'username' => '',
            'password' => '',
            'auth'     => false, //Enable SMTP authentication
            //'secure'   => 'ssl', //Set the encryption system to use - ssl (deprecated) or tls
        ],
        'default' => [
            'email' => 'affiliates@vbet.com',
            'name'  => '',
        ]
    ],


    'languages'          => [
        "en_GB" => "English",
    ],


    'languagesCode'      => [
        "en_GB" => "English (Uk)",
        "ru_RU" => "Russian",
        "hy_AM" => "Armenian",
        'de_DE' => 'German',
        'es_ES' => 'Spanish',
        'tr_TR' => 'Turkish',
        'el_GR' => 'Greece',
        'it_IT' => 'Italian',
        'zh_CN' => 'Chinese'
    ],

    'cron' => [
        'playersCasinoBonus' => false,
    ],

    'environment' => 'development',
    'timezone'    => 'Asia/Yerevan',
    'template'    => 'cloud2',
];