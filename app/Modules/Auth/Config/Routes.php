<?php

$routes->group('', ['namespace' => 'Auth\Controllers'], function($routes) {
	// Registration
    $routes->get('travel-agent-signup', 'RegistrationController::register', ['as' => 'register']);
    $routes->post('signupaa', 'RegistrationController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'RegistrationController::activateAccount', ['as' => 'activate-account']);
    
    // Login/out
    $routes->get('admin/login', 'LoginController::login', ['as' => 'login']);
    $routes->post('admin/login', 'LoginController::attemptLogin');
    $routes->get('logout', 'LoginController::logout');
    $routes->get('userdata', 'AccountController::userdata');
    
    // users data
    $routes->get('admin/users', 'AccountController::userList');
    $routes->get('admin/user/create', 'AccountController::userCreate');
    $routes->post('admin/user/create', 'AccountController::userCreate');
    
    $routes->post('user_create/(:num)', 'AccountController::user_create/$1');
    $routes->get('user_create/(:num)', 'AccountController::user_create/$1');
    $routes->post('auth_ajax', 'AccountController::ajax');


   

    // Forgotten password and reset
    $routes->get('forgot-password', 'PasswordController::forgotPassword', ['as' => 'forgot-password']);
    $routes->post('forgot-password', 'PasswordController::attemptForgotPassword');
    $routes->get('reset-password', 'PasswordController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'PasswordController::attemptResetPassword');

    // Account settings
    $routes->get('account', 'AccountController::account', ['as' => 'account']);
    $routes->post('account', 'AccountController::updateAccount');
    $routes->post('change-email', 'AccountController::changeEmail');
    $routes->get('confirm-email', 'AccountController::confirmNewEmail');
    $routes->post('change-password', 'AccountController::changePassword');
    $routes->post('delete-account', 'AccountController::deleteAccount');
});
