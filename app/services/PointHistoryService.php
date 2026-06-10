<?php

namespace app\services;

use app\models\LoyalPoints;
use app\models\PointLogs;
use app\models\Tiers;
use app\models\User;
use Exception;

class PointHistoryService
{
    private $userModel;
    private $pointLogModel;
    private $loyalModel;
    private $tierModel;


    public function __construct()
    {
        $this->userModel = new User;
        $this->pointLogModel = new PointLogs;
        $this->tierModel = new Tiers;
        $this->loyalModel = new LoyalPoints;
    }

    public function getPointHistoryData($userId)
    {
        $user = $this->userModel->getUserById($userId);
        if (!$user) {
            throw new Exception("کاربر مورد نظر در سیستم یافت نشد.");
        }
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $logsPerPage = 10;
        $pointLogs = $this->pointLogModel->getLogPointByUserId($userId, $currentPage, $logsPerPage);
        $totalLogsPoint = $this->pointLogModel->getTotalLogPoints($userId);
        $totalPages = ceil($totalLogsPoint / $logsPerPage);
        $currentPoints = $this->loyalModel->getLoyalPointByUserId($userId);
        $currentTier = $this->tierModel->getTiersByPoint($userId);
        $totalEarned = $this->pointLogModel->getTotalEarnedPoints($userId);



        return [
            'user' => $user,
            'pointLogs' => $pointLogs,
            'currentPoint' => $currentPoints,
            'currentTier' => $currentTier,
            'currentPage' => $currentPage,
            'logsPerPage' => $logsPerPage,
            'totalLogsPoint' => $totalLogsPoint,
            'totalPages' => $totalPages,
            'totalEarned' => $totalEarned,
        ];
    }
}
