<?php

namespace app\models;

use app\core\Database;
use PDO;

class PointLogs
{
    private $db;
    public function __construct()
    {
        $this->db = (new Database())->conn;
    }
    public function getLogPointByUserId($user_id, $pageNum = 1, $logsPerPage = 10)
    {
        $offset = ($pageNum - 1) * $logsPerPage;
        $stmt = $this->db->prepare("SELECT * FROM point_logs WHERE user_id = :user_id ORDER BY id DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $logsPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getLogPointByUserIdLimit($user_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM point_logs WHERE user_id = :user_id ORDER BY id DESC LIMIT 5");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function createPointLog($user_id, $points_change, $type, $description)
    {
        $stmt = $this->db->prepare("INSERT INTO point_logs (user_id, points_change, type, description) VALUES (:user_id, :points_change, :type, :description)");
        $stmt->execute(["user_id" => $user_id, "points_change" => $points_change, "type" => $type, "description" => $description]);
    }
    public function hasClaimedBirthdayBonusThisYear($user_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM point_logs WHERE user_id = :user_id AND type = 'birthday_bonus' AND YEAR(created_at) = YEAR(CURRENT_DATE())");
        $stmt->execute(['user_id' => $user_id]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    public function getTotalEarnedPoints($user_id)
    {
        $stmt = $this->db->prepare("SELECT SUM(points_change) AS total_earned FROM point_logs WHERE user_id = :user_id AND points_change > 0");
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result->total_earned ? (int)$result->total_earned : 0;
    }
    public function getTotalDeductedPoints($user_id)
    {
        $stmt = $this->db->prepare("SELECT SUM(points_change) AS total_earned FROM point_logs WHERE user_id = :user_id AND points_change < 0");
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result->total_earned ? (int)$result->total_earned : 0;
    }
    public function getTotalLogPoints($user_id)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM point_logs WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchColumn();
    }

    #جمع تمام لاگ پوینت های مثبت برای تمام کاربران
    // public function getAllTotalEarnedPoints()
    // {
    //     $stmt = $this->db->prepare("SELECT SUM(points_change) AS total_earned FROM point_logs WHERE points_change > 0");
    //     $stmt->execute();
    //     $result = $stmt->fetch(PDO::FETCH_OBJ);

    //     return $result->total_earned ? (int)$result->total_earned : 0;
    // }


    # جمع تمام لاگ پوینت های مثبت برای تمام کاربران


    public function getAllTotalEarnedPoints($startDate = null, $endDate = null)
    {
        $sql = "SELECT SUM(points_change) AS total_earned FROM point_logs WHERE points_change > 0";
        $params = [];

        if ($startDate && $endDate) {
            $sql .= " AND created_at BETWEEN :start_date AND :end_date";
            $params[':start_date'] = $startDate;
            $params[':end_date']   = $endDate;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result->total_earned ? (int)$result->total_earned : 0;
    }

    # جمع تمام لاگ پوینت های منفی (مصرف شده) برای تمام کاربران
    public function getAllTotalDeductedPoints($startDate = null, $endDate = null)
    {
        $sql = "SELECT SUM(points_change) AS total_deducted FROM point_logs WHERE points_change < 0";
        $params = [];

        if ($startDate && $endDate) {
            $sql .= " AND created_at BETWEEN :start_date AND :end_date";
            $params[':start_date'] = $startDate;
            $params[':end_date']   = $endDate;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result->total_deducted ? abs((int)$result->total_deducted) : 0;
    }

    #یک متد جدید اضافه می‌کنیم که فقط امتیازات مثبت را در بازه زمانی مشخص برگرداند تا در پی اچ پی آن‌ها را گروه‌بندی کنیم:
    public function getEarnedPointsTrend($startDate = null, $endDate = null)
    {
        $query = "SELECT points_change, created_at FROM point_logs WHERE points_change > 0";
        $params = [];

        if ($startDate && $endDate) {
            $query .= " AND created_at BETWEEN :start_date AND :end_date";
            $params['start_date'] = $startDate;
            $params['end_date'] = $endDate;
        }

        $query .= " ORDER BY created_at ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
