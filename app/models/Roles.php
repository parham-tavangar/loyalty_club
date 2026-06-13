<?php

namespace app\models;

use app\core\Database;

class Roles
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->conn;
    }

    public function getRoles()
    {
        $stmt = $this->db->query("SELECT * FROM roles ORDER BY id ASC");
    }
}
