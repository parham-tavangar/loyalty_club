<?php

namespace app\controllers\admin;

use app\services\UserService;
use app\views\admin\AdminViewer;

class AdminUserController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService;
    }

    public function loginForm()
    {
        $viewer = new AdminViewer();
        $viewer->renderreglog("users/login.php");
    }
    public function login($data)
    {
        $result = $this->userService->processAdminLogin($data);

        if ($result['status'] === 'validation_error') {
            redirect("admin-panel/users/login-form", ['form_errors' => $result['errors']]);
        } elseif ($result['status'] === 'invalid_credentials') {
            redirect("admin-panel/users/login-form", ['error' => "موبایل یا رمز عبور اشتباه است"]);
        } elseif ($result['status'] === 'success') {
            $_SESSION['user_id'] = $result['user']->id;
            $_SESSION['user_mobile'] = $result['user']->mobile;
            $_SESSION['user_role'] = $result['user']->role;
            redirect("admin-panel", ['success' => "شما با موفقیت وارد شدید"]);
        }
    }
}
