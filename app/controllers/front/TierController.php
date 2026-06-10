<?php

namespace app\controllers\front;

use app\services\TierService;
use app\views\front\Viewer;

class TierController
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect("users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }


        $userId = $_SESSION['user_id'];
        $tierService = new TierService();
        $data = $tierService->getTierData($userId);

        $viewer = new Viewer();
        $viewer->render("tiers/index.php", $data);
    }
}
