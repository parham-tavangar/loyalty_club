<?php

$routes = [
    'GET' => [
        "" => ['controller' => 'app\controllers\front\HomeController', 'method' => 'index'],
        "users/register" => ['controller' => 'app\controllers\front\UserController', 'method' => 'register'],
        "users/login-form" => ['controller' => 'app\controllers\front\UserController', 'method' => 'loginForm'],
        "points/my-points" => ['controller' => 'app\controllers\front\PointController', 'method' => 'index'],
        "points/history" => ['controller' => 'app\controllers\front\PointHistoryController', 'method' => 'index'],
        "users/tier" => ['controller' => 'app\controllers\front\TierController', 'method' => 'index'],
        "users/profile" => ['controller' => 'app\controllers\front\UserProfileController', 'method' => 'index'],
        "admin-panel" => ['controller' => 'app\controllers\admin\AdminHomeController', 'method' => 'index'],
        "admin-panel/users/login-form" => ['controller' => 'app\controllers\admin\AdminUserController', 'method' => 'loginForm'],
        "admin-panel/user_management/users_list" => ['controller' => 'app\controllers\admin\AdminUsersListController', 'method' => 'index'],
        "admin-panel/user_management/users_list/search" => ['controller' => 'app\controllers\admin\AdminUsersListController', 'method' => 'search'],



    ],
    'POST' => [
        "users/store" => ['controller' => 'app\controllers\front\UserController', 'method' => 'store'],
        "users/login" => ['controller' => 'app\controllers\front\UserController', 'method' => 'login'],
        "admin-panel/users/login" => ['controller' => 'app\controllers\admin\AdminUserController', 'method' => 'login'],
        "users/profile/edit" => ['controller' => 'app\controllers\front\UserProfileController', 'method' => 'edit'],
        "users/logout" => ['controller' => 'app\controllers\front\UserController', 'method' => 'logOut'],
        "claim-birthday-bonus" => ['controller' => 'app\controllers\front\HomeController', 'method' => 'claimBirthdayBonus'],
    ]
];
