<?php

return [
    // Auth
    'username' => env('STAGING_USERNAME','staging@admin.test'),
    'password' => env('STAGING_PASSWORD','asdasd9i8u123'),

    // Login Route
    'login_route' => '/staging/login',

    // Logout Route
    'logout_route' => '/staging/logout',

    // Redirect After Login
    'login_redirect' => '/',


    // Login Failed Message
    'failed_message' => 'Your username or password is incorrect',

    // Session Time in Seconds
    'session_time' => 60*60*24
];