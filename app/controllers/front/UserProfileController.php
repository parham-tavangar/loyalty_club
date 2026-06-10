<?php

namespace app\controllers\front;

use app\services\UserProfileService;
use app\views\front\Viewer;

class UserProfileController
{
    private $userProfileService;
    public function __construct()
    {
        $this->userProfileService = new UserProfileService();
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect("users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }


        $userId = $_SESSION['user_id'];
        $data = $this->userProfileService->getUserData($userId);

        $viewer = new Viewer();
        $viewer->render("users/profile/index.php", $data);
    }



    public function edit($data)
    {
        if (!isset($_SESSION['user_id'])) {
            redirect("users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }


        $userId = $_SESSION['user_id'];
        $result = $this->userProfileService->editUserData($userId, $data);

        if ($result['status'] === 'validation_error') {
            redirect("users/profile", ['form_errors' => $result['errors']]);
        } elseif ($result['status'] === 'duplicate_mobile') {
            redirect("users/profile", ['error' => 'این شماره موبایل توسط کاربر دیگری استفاده شده است.']);
        } elseif ($result['status'] === 'exception') {
            redirect("users/profile", ['error' => 'خطایی در سیستم رخ داد، لطفا دوباره تلاش کنید.']);
        } elseif ($result['status'] === 'success') {
            redirect("users/profile", ['success' => "تغییرات در پروفایل اعمال شد"]);
        }
    }
}
