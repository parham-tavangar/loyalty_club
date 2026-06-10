<?php

namespace app\services;

use app\models\LoyalPoints;
use app\models\PointLogs;
use app\models\Tiers;
use app\models\User;
use Exception;

class PointService
{
    private $userModel;
    private $loyalModel;
    private $pointLogModel;
    private $tierModel;


    public function __construct()
    {
        $this->userModel = new User;
        $this->loyalModel = new LoyalPoints;
        $this->pointLogModel = new PointLogs;
        $this->tierModel = new Tiers();
    }

    public function getPointData($userId)
    {
        $user = $this->userModel->getUserById($userId);
        if (!$user) {
            throw new Exception("کاربر مورد نظر در سیستم یافت نشد.");
        }

        $currentPoints = $this->loyalModel->getLoyalPointByUserId($userId);
        $currentTier = $this->tierModel->getTiersByPoint($userId);
        $pointLogs = $this->pointLogModel->getLogPointByUserIdLimit($userId);
        $rialPoint = $currentPoints->points * 1000;
        $nextTier = $this->tierModel->getNextTiers($userId);
        $totalEarned = $this->pointLogModel->getTotalEarnedPoints($userId);
        $totalDeducted = $this->pointLogModel->getTotalDeductedPoints($userId);




        $pointsNeededForNextTier = 0;

        if ($nextTier) {
            $pointsNeededForNextTier = $nextTier->min_points - $currentPoints->points;
        }


        return [
            'user' => $user,
            'currentPoint' => $currentPoints,
            'currentTier' => $currentTier,
            'rialPoint' => $rialPoint,
            'PNFNT' => $pointsNeededForNextTier,
            'pointLogs' => $pointLogs,
            'totalEarned' => $totalEarned,
            'totalDeducted' => $totalDeducted,
        ];
    }
}
