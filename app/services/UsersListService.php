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

        $currentPoints = $this->loyalModel->getLoyalPointByUserId($userId);
        $currentTier = $this->tierModel->getTiersByPoint($userId);


        return [
            'user' => $user,
            'currentPoint' => $currentPoints,
            'currentTier' => $currentTier,
        ];
    }
}
