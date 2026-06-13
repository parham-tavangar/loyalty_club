<?php

namespace app\services;

use app\models\LoyalPoints;
use app\models\Tiers;
use app\models\User;
use Exception;

class UsersListService
{
    private $userModel;
    private $loyalModel;
    private $tierModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->tierModel = new Tiers();
        $this->loyalModel = new LoyalPoints();
    }

    public function getUsersListData($userId)
    {
        $user = $this->userModel->getUserById($userId);
        if (!$user) {
            throw new Exception("کاربر مورد نظر در سیستم یافت نشد.");
        }

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10; // تعداد کاربران در هر صفحه
        $offset = ($currentPage - 1) * $limit;

        $UsersDetails = $this->userModel->getAllUsersWithDetails($limit, $offset);

        $totalUsers = $this->userModel->countAllUsers();
        $totalPages = ceil($totalUsers / $limit);

        return [
            'user' => $user,
            'UsersDetails' => $UsersDetails,
            'currentPage' => $currentPage,
            'limit' => $limit,
            'totalUsers' => $totalUsers,
            'totalPages' => $totalPages,
            'startItem' => $offset + 1,
            'endItem' => min($offset + $limit, $totalUsers)
        ];
    }
}
