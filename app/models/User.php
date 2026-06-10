<?php

namespace app\models;

use app\core\Database;
use PDO;

class User
{
    private $db;
    private $table = "users";
    public function __construct()
    {
        $this->db = (new Database())->conn;
    }
    public function getUsers()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }
    public function getUserByMobile($mobile)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE mobile = :mobile");
        $stmt->execute(['mobile' => $mobile]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function editUserById($id, $name, $password, $birthday, $mobile)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET name = :name, mobile = :mobile, password = :password, birthday = :birthday, updated_at = CURRENT_TIMESTAMP WHERE id = :id ");
        $stmt->execute(['id' => $id, 'name' => $name, 'password' => $password, 'birthday' => $birthday, 'mobile' => $mobile]);
    }

    public function createUser($name, $mobile, $password, $birthday)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (name, mobile, password, birthday) VALUES (:name, :mobile, :password, :birthday)");
        $stmt->execute(['name' => $name, 'mobile' => $mobile, 'password' => $password, 'birthday' => $birthday]);
    }
    public function updateTierId($userId, $newTierId)
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET tier_id = :tier_id WHERE id = :userId");
        $stmt->execute(['tier_id' => $newTierId, 'userId' => $userId]);
    }

    #گرفتن آخرین یوزر ها بر اساس تاریخ ایجاد اکانتشون
    public function geLastUsers()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}  ORDER BY id DESC LIMIT 4");
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    #گرفتن یوزر ها بر اساس فیلتر زمانی
    public function getAllUsersFilter($startDate = null, $endDate = null)
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


    public function getTotalUsersCount($startDate = null, $endDate = null)
    {
        $sql = "SELECT COUNT(*) FROM users";
        $params = [];

        // اگر بازه زمانی ارسال شده بود، شرط را اضافه کن
        if ($startDate && $endDate) {
            $sql .= " WHERE created_at BETWEEN :start_date AND :end_date";
            $params[':start_date'] = $startDate;
            $params[':end_date'] = $endDate;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchColumn(); // فقط عدد تعداد کاربران را برمی‌گرداند
    }
}
