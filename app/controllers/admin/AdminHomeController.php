<?php

namespace app\controllers\admin;

use app\services\HomeService;
use app\views\admin\AdminViewer;
use Exception;

class AdminHomeController
{
    public function index()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            redirect("admin-panel/users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
        $userId = $_SESSION['user_id'];
        $filter = $_GET['filter'] ?? 'all';

        try {
            $homeService = new HomeService();
            $data = $homeService->getHomeData($userId, $filter);
            $data['currentFilter'] = $filter;
            $viewer = new AdminViewer();
            $viewer->render("home/index.php", $data);
        } catch (Exception $ex) {
            redirect("admin-panel/users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
    }
}
