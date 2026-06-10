<?php

namespace app\controllers\front;

use app\services\PointService;
use app\views\front\Viewer;

class PointController
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect("users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }


        $userId = $_SESSION['user_id'];
        $pointService = new PointService;
        $data = $pointService->getPointData($userId);

        $viewer = new Viewer;
        $viewer->render("points/index.php", $data);
    }
}
