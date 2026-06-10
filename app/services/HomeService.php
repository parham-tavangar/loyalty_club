<?php

namespace app\services;

use app\core\Database;
use app\models\LoyalPoints;
use app\models\PointLogs;
use app\models\Tiers;
use app\models\User;
use Exception;
use Morilog\Jalali\Jalalian;

class HomeService
{
    private $userModel;
    private $loyalModel;
    private $tierModel;
    private $pointLogModel;
    private $db;

    public function __construct()
    {
        $this->userModel = new User();
        $this->loyalModel = new LoyalPoints();
        $this->tierModel = new Tiers();
        $this->pointLogModel = new PointLogs();
        $this->db = new Database();
    }

    public function getHomeData($userId, $filter = 'all')
    {
        $user = $this->userModel->getUserById($userId);
        if (!$user) {
            throw new Exception("کاربر مورد نظر در سیستم یافت نشد.");
        }

        // --- شروع منطق فیلتر زمانی شمسی ---
        $startDate = null;
        $endDate = null;

        if ($filter !== 'all') {
            $now = Jalalian::now();
            $year = $now->getYear();
            $month = $now->getMonth();
            $day = $now->getDay();

            switch ($filter) {
                case 'today':
                    $startDate = (new Jalalian($year, $month, $day, 0, 0, 0))->toCarbon()->toDateTimeString();
                    $endDate   = (new Jalalian($year, $month, $day, 23, 59, 59))->toCarbon()->toDateTimeString();
                    break;

                case 'month':
                    $monthDays = (new Jalalian($year, $month, 1))->getMonthDays();
                    $startDate = (new Jalalian($year, $month, 1, 0, 0, 0))->toCarbon()->toDateTimeString();
                    $endDate   = (new Jalalian($year, $month, $monthDays, 23, 59, 59))->toCarbon()->toDateTimeString();
                    break;

                case 'year':
                    $isLeapYear = $now->isLeapYear();
                    $lastDayOfYear = $isLeapYear ? 30 : 29;
                    $startDate = (new Jalalian($year, 1, 1, 0, 0, 0))->toCarbon()->toDateTimeString();
                    $endDate   = (new Jalalian($year, 12, $lastDayOfYear, 23, 59, 59))->toCarbon()->toDateTimeString();
                    break;
            }
        }
        // --- پایان منطق فیلتر زمانی ---

        $tiers = $this->tierModel->getTiers();
        $currentPoints = $this->loyalModel->getLoyalPointByUserId($userId);
        $currentTier = $this->tierModel->getTiersByPoint($userId);
        $nextTier = $this->tierModel->getNextTiers($userId);
        $pointLogs = $this->pointLogModel->getLogPointByUserIdLimit($userId);
        $allTotalEarned = $this->pointLogModel->getAllTotalEarnedPoints($startDate, $endDate);
        $getAllTotalDeductedPoints = $this->pointLogModel->getAllTotalDeductedPoints($startDate, $endDate);
        $totalRegisteredUsers = $this->userModel->getTotalUsersCount($startDate, $endDate);
        $lastUsers = $this->userModel->geLastUsers();

        // --- شروع منطق دیتای نمودار (فقط امتیازات کسب شده) ---
        // گرفتن دیتای خام امتیازهای مثبت از دیتابیس در بازه زمانی مشخص
        $trendData = $this->pointLogModel->getEarnedPointsTrend($startDate, $endDate);

        $chartData = [];
        // گروه‌بندی داده‌ها برای محور X نمودار بر اساس نوع فیلتر
        foreach ($trendData as $row) {
            $jalaliDate = Jalalian::fromDateTime($row['created_at']);

            if ($filter == 'year') {
                $label = $jalaliDate->format('%B'); // نمایش نام ماه (مثلا: فروردین)
            } elseif ($filter == 'month') {
                $label = $jalaliDate->format('d %B'); // نمایش روز و ماه (مثلا: 15 اردیبهشت)
            } elseif ($filter == 'today') {
                $label = $jalaliDate->format('H:00'); // نمایش ساعت (مثلا: 14:00)
            } else {
                $label = $jalaliDate->format('Y/m'); // نمایش سال و ماه برای حالت "همه" (مثلا: 1402/05)
            }

            // اگر این لیبل قبلا نبوده مقدار اولیه صفر بده، بعد امتیاز این رکورد را به آن اضافه کن
            if (!isset($chartData[$label])) {
                $chartData[$label] = 0;
            }
            $chartData[$label] += $row['points_change'];
        }
        // --- پایان منطق دیتای نمودار ---




        $isBirthday = false;
        $hasClaimedBirthdayBonus = false;

        if (!empty($user->birthday)) {
            $todayMonthDay = Jalalian::now()->format('m-d');

            $userMonthDay = substr($user->birthday, 5, 5);

            if ($userMonthDay == $todayMonthDay) {
                $isBirthday = true;
                $hasClaimedBirthdayBonus = $this->pointLogModel->hasClaimedBirthdayBonusThisYear($userId);
            }
        }


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
            'tiers' => $tiers,
            'pointLogs' => $pointLogs,
            'user' => $user,
            'currentPoint' => $currentPoints,
            'currentTier' => $currentTier,
            'nextTier' => $nextTier,
            'PNFNT' => $pointsNeededForNextTier,
            'progressPercentage' => $progressPercentage,
            'isBirthday' => $isBirthday,
            'hasClaimedBirthdayBonus' => $hasClaimedBirthdayBonus,
            'allTotalEarned' => $allTotalEarned,
            'lastUsers' => $lastUsers,
            'getAllTotalDeductedPoints' => $getAllTotalDeductedPoints,
            'totalRegisteredUsers' => $totalRegisteredUsers,
            // ارسال دیتای پردازش شده‌ی نمودار به ویو
            'chartData' => $chartData,


        ];
    }
    public function claimBirthdayBonus($userId)
    {
        $user = $this->userModel->getUserById($userId);
        if (!$user || empty($user->birthday)) {
            throw new Exception("اطلاعات کاربر یا تاریخ تولد نامعتبر است");
        }
        $todayMonthDay = Jalalian::now()->format('m-d');
        $userMonthDay = substr($user->birthday, 5, 5);

        if ($userMonthDay != $todayMonthDay) {
            throw new Exception("امروز روز تولد شما نیست.");
        }
        if ($this->pointLogModel->hasClaimedBirthdayBonusThisYear($userId)) {
            throw new Exception("شما قبلاً هدیه تولد امسال را دریافت کرده‌اید.");
        }
        $description = "50 امتیاز برای تولد";

        $this->db->beginTransaction();
        try {
            $this->loyalModel->addPoint($userId, 50);
            $this->pointLogModel->createPointLog($userId, 50, 'birthday_bonus', $description);

            $newTier = $this->tierModel->getTiersByPoint($userId);
            if ($newTier) {
                $this->userModel->updateTierId($userId, $newTier->id);
            }
            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            throw new Exception("خطایی در ثبت هدیه رخ داد: " . $e->getMessage());
        }
    }
}
