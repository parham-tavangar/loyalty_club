<?php

namespace app\controllers\front;

use app\services\HomeService;
use app\views\front\Viewer;
use Exception;

class HomeController
{
    public function index()
    {
        if (!isset($_SESSION['user_id']) and $_SESSION['role'] == 'user') {
            redirect("users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
        $userId = $_SESSION['user_id'];

        try {
            $homeService = new HomeService();
            $data = $homeService->getHomeData($userId);
            $viewer = new Viewer();
            $viewer->render("home/index.php", $data);
        } catch (Exception $ex) {
            redirect("users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
    }

    public function claimBirthdayBonus()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect("users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
        $userId = $_SESSION['user_id'];
        $homeService = new HomeService();

        try {
            $homeService->claimBirthdayBonus($userId);
            redirect("", ['success' => "تولدت مبارک! هدیه شما با موفقیت دریافت شد."]);
        } catch (Exception $ex) {
            redirect("", ['error' => $ex->getMessage()]);
        }
    }
}
