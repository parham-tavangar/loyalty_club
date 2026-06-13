<?php

namespace app\controllers\admin;

use app\services\UsersCreateService;
use app\services\UsersListService;
use app\views\admin\AdminViewer;
use Exception;

class AdminCreateUsers
{
    private $usersCreateService;

    public function __construct()
    {
        $this->usersCreateService = new UsersCreateService;
    }

    public function create()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            redirect("admin-panel/users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
        $userId = $_SESSION['user_id'];

        try {
            $UsersListService = new UsersListService();
            $data = $UsersListService->getUsersListData($userId);
            $viewer = new AdminViewer();
            $viewer->render("user_management/createUser/index.php", $data);
        } catch (Exception $ex) {
            redirect("admin-panel/users/login-form", ['error' => "در ابتدا وارد سیستم شوید"]);
        }
    }

    public function store($data)
    {
        $userId = $_SESSION['user_id'];
        $result = $this->usersCreateService->creatUser($userId, $data);

        if ($result['status'] === 'validation_error') {
            redirect("admin-panel/user_management/create_user", ['form_errors' => $result['errors']]);
        } elseif ($result['status'] === 'duplicate_mobile') {
            redirect("admin-panel/user_management/create_user", ['error' => "این موبایل قبلا ثبت شده است."]);
        } elseif ($result['status'] === 'exception') {
            redirect("admin-panel/user_management/create_user");
        } elseif ($result['status'] === 'success') {
            redirect("admin-panel/user_management/create_user", ['success' => "کاربر با موفقیت ایجاد شد"]);
        }
    }
}
