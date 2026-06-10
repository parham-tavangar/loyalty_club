<?php

namespace app\controllers\front;

use app\services\PointHistoryService;
use app\views\front\Viewer;

class PointHistoryController
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect("users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }


        $userId = $_SESSION['user_id'];
        $pointHistoryData = new PointHistoryService;
        $data = $pointHistoryData->getPointHistoryData($userId);

        $viewer = new Viewer;
        $viewer->render("points/history/index.php", $data);
    }
}
