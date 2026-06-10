<?php
namespace app\models;

use app\core\Database;
use PDO;

class Tiers
{
    private $db;
    private $table = "loyalty_points";

    public function __construct()
    {
        $this->db = (new Database())->conn;
    }
    public function getTiers()
    {
        $stmt = $this->db->query("SELECT * FROM tiers ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
    public function getTiersByPoint($user_id)
    {
        $stmt = $this->db->prepare("SELECT tiers.id, tiers.name, tiers.min_points, tiers.max_points, loyalty_points.points FROM tiers JOIN loyalty_points ON loyalty_points.points >= tiers.min_points AND (loyalty_points.points <= tiers.max_points OR tiers.max_points IS NULL) WHERE loyalty_points.user_id = :user_id ORDER BY tiers.min_points DESC LIMIT 1");
        $stmt->execute(['user_id' => $user_id]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function getNextTiers($user_id)
    {
        $stmt = $this->db->prepare("SELECT tiers.id,tiers.name,tiers.min_points,tiers.max_points,loyalty_points.points FROM loyalty_points INNER JOIN tiers ON tiers.min_points > loyalty_points.points WHERE loyalty_points.user_id = :user_id ORDER BY tiers.min_points ASC LIMIT 1");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}