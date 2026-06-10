<?php

namespace app\services;

use app\models\LoyalPoints;
use app\models\Tiers;
use app\models\User;
use Exception;

class TierService
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
    public function getTierData($userId)
    {
        $user = $this->userModel->getUserById($userId);
        if (!$user) {
            throw new Exception("کاربر مورد نظر در سیستم یافت نشد.");
        }

        $tiers = $this->tierModel->getTiers();
        $currentPoints = $this->loyalModel->getLoyalPointByUserId($userId);
        $currentTier = $this->tierModel->getTiersByPoint($userId);
        $nextTier = $this->tierModel->getNextTiers($userId);

        $pointsNeededForNextTier = 0;

        if ($nextTier) {
            $pointsNeededForNextTier = $nextTier->min_points - $currentPoints->points;
        }

        $progressPercentage = 0;

        if ($pointsNeededForNextTier > 0 && isset($nextTier)) {
            $earnedInLevel = $currentPoints->points - $currentTier->min_points;
            $totalLevelPoints = $nextTier->min_points - $currentTier->min_points;

            if ($totalLevelPoints > 0) {
                $progressPercentage = ($earnedInLevel / $totalLevelPoints) * 100;
            }
        } elseif ($pointsNeededForNextTier == 0) {
            $progressPercentage = 100;
        }

        $progressPercentage = round($progressPercentage);


        return [
            'user' => $user,
            'tiers' => $tiers,
            'currentPoint' => $currentPoints,
            'currentTier' => $currentTier,
            'PNFNT' => $pointsNeededForNextTier,
            'nextTier' => $nextTier,
            'progressPercentage' => $progressPercentage,

        ];
    }
}