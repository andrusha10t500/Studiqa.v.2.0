<?php

return [



    'driver' => env('MAIL_DRIVER', 'smtp'),



    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
//    'host' => env('MAIL_HOST', 'smtp.googlemail.com'),


//    'port' => env('MAIL_PORT', 465),
    'port' => env('MAIL_PORT', 2525),



    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
//        'address' => env('MAIL_FROM_ADDRESS', 'myTestForApp@gmail.com'),
//        'name' => env('MAIL_FROM_NAME', 'myTest'),
    ],



    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),



    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

//        'username' => env('myTestForApp@gmail.com'),
//
//        'password' => env('378%^$5H5HHH'),



    'sendmail' => '/usr/sbin/sendmail -bs',
//    'pretend' => false,


    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],


    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
