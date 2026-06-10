<?php
namespace app\models;
use app\core\Database;
use PDO;

class LoyalPoints
{
    private $db;
    private $table = "loyalty_points";

    public function __construct()
    {
        $this->db = (new Database())->conn;
    }
    public function getLoyalPoints()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
    public function getLoyalPointByUserId($user_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_OBJ);


    }

    public function createLoyalPoint($user_id)
    {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (user_id, points) VALUES (:user_id, 0)");
        $stmt->execute(['user_id' => $user_id]);


    }
    public function addPoint($user_id, $pointToAdd)
    {
        $stmt = $this->db->prepare("UPDATE loyalty_points SET points = points + :pointToAdd WHERE user_id = :user_id");
        return $stmt->execute(['pointToAdd' => $pointToAdd, 'user_id' => $user_id]);
    }


}